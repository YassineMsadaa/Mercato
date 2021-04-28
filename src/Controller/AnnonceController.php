<?php
namespace App\Controller;


use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;

use Symfony\Component\Routing\Annotation\Route;


class AnnonceController extends AbstractController
{

    /**
     * @var AnnonceRepository
     */
    private $repository;
    /*
     * @var ObjectManager
     */



    public function __construct(AnnonceRepository $repository)
     {
        $this->repository =$repository;
    }





    /**
     * @Route("/biens", name="annonce.index")
     * @return Response
     */



    public function index(PaginatorInterface $paginator): Response
    {

        $annonces = $this->repository->findAll();
        return $this->render('annonce/index.html.twig',['annonces' => $annonces] );

     }
}