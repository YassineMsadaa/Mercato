<?php
namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


class AdminAnnonceController extends AbstractController{

    /**
     * @var AnnonceRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;


    public function  __construct(AnnonceRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.annonce.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PaginatorInterface $paginator,Request $request)
    {
        $annonces = $paginator->paginate( $this->repository->findAllAnnonceQuery(),
        $request->query->getInt('page', 1),
        4);
        return $this->render('admin/annonces/index.html.twig', compact('annonces') );

    }

    /**
     * @Route("/admin/annonce/create", name="admin.annonce.new")
     */

    public function new(Request $request)
    {
        $annonce= new Annonce();
        $form= $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($annonce);
            $this->em->flush();
            return $this->redirectToRoute('admin.annonce.index');
        }


        return $this->render('admin/annonces/new.html.twig', [
            'annonce'=> $annonce,
            'form'=> $form->createView()
        ]);
    }
    /**
     * @Route("/admin/annonce/{id}", name="admin.annonce.edit", methods="GET|POST")
     * @param Annonce $annonce
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function edit(Annonce $annonce, Request $request)
    {
        $form= $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            
            $this->em->flush();
            return $this->redirectToRoute('admin.annonce.index');
        }


        
        return $this->render('admin/annonces/edit.html.twig', [
            'annonce'=> $annonce,
            'form'=> $form->createView()
        ]);
    }
    /**
     * @Route("/admin/annonce/{id}", name="admin.annonce.delete", methods="DELETE")
     */

    public function delete(Annonce $annonce, Request $request)
    {
        if($this->isCsrfTokenValid('delete' . $annonce->getId(), $request->get('_token')))
        {
             $this->em->remove($annonce);
             $this->em->flush();

        }



        return $this->redirectToRoute('admin.annonce.index');

    }


    //  ####################################tri #################################################
        /**
     * @Route("/admin/tri_titre", name="admin.annonce.order.titre")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tri_titre(PaginatorInterface $paginator,Request $request)
    {
        $annonces = $paginator->paginate( $this->repository->trier('titre','ASC'),
        $request->query->getInt('page', 1),
        4);
        return $this->render('admin/annonces/index.html.twig', compact('annonces') );

    }

        /**
     * @Route("/admin/tri_date", name="admin.annonce.order.datemodif")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tri_date(PaginatorInterface $paginator,Request $request)
    {
        $annonces = $paginator->paginate( $this->repository->trier('datemodif','DESC'),
        $request->query->getInt('page', 1),
        4);
        return $this->render('admin/annonces/index.html.twig', compact('annonces') );

    }

}