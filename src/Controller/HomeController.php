<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

use Symfony\Component\HttpFoundation\Request ;

class HomeController extends AbstractController
{
    /**
     * @var AnnonceRepository
     */
    private $repository;


    public function __construct(AnnonceRepository $repository)
    {
        $this->repository =$repository;
    }


    /**
     * @Route("/annonces/{id}", name="annonce.id")
     * @return Response
     *
     */
    public function annonceById(int $id): Response
    {
        $annonce = $this->repository->find($id);

        return $this->render('pages/annonce.html.twig',['annonce' => $annonce] );

    }


    public function index(PaginatorInterface $paginator,Request $request): Response
    {

        $count = $this->repository->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $annonces = $paginator->paginate( $this->repository->findAllAnnonceQuery(),
        $request->query->getInt('page', 1),
        4);

        $annocenew = $this->repository->createQueryBuilder('a')
                        ->orderBy('a.datemodif','DESC')
                        ->setMaxResults(3)
                        ->getQuery()
                        ->getResult();

        

        return $this->render('pages/home2.html.twig',['annonces' => $annonces,'nb_annonce' => $count,'annoncenew'=>$annocenew] );
    }




}

