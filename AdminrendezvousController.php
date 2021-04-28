<?php

namespace App\Controller;


use App\Entity\RendezVous;
use App\Form\RendezVousType;



use App\Repository\RendezVousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminrendezvousController extends AbstractController
{
    /**
     * @Route("/adminrendezvous", name="adminrendezvous")
     */
    public function index(): Response
    {
        return $this->render('adminrendezvous/index.html.twig', [
            'controller_name' => 'AdminrendezvousController',
        ]);
    }



    /**
     * @Route ("/addrdv",name="addrendez-vous")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    function add(Request $request){
        $rendezvous=new RendezVous();
        $form=$this->createForm(RendezVousType::class,$rendezvous);
        $form->add('Add',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($rendezvous);
            $em->flush();
            return $this->redirectToRoute('rr');
        }
        return $this->render("rendez_vous/index.html.twig",array('form'=>$form->createView()));

    }
    /**
     * @param RendezVousRepository $repository
     * @return Response
     * @Route("/rdvafficheradmin",name="rr")
     */
    public function listrendezvous(RendezVousRepository $repository){
        $rendezvous=$repository->findAll();
        return $this->render('adminrendezvous/afficherdvadmin.html.twig',array("rendezvous"=>$rendezvous));
    }


    /**
     * @Route ("/supprdv {id}",name="d")
     * @param $id
     * @param RendezVousRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function Delete( $id , RendezVousRepository $repository)
    {
        $rendezvous = $repository-> find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($rendezvous);
        $em->flush();
        return $this->redirectToRoute('r');
    }

    /**
     * @Route("Updaterdv {id}",name="update")
     * @param RendezVousRepository $repository
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    function Update(RendezVousRepository $repository,$id,Request $request){
        $rendezvous=$repository->find($id);
        $form=$this->createForm(RendezVousType::class,$rendezvous);
        $form->add('Update',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('rr');
        }
        return $this->render("rendez_vous/update.html.twig",array('f'=>$form->createView()));

    }
    /**
     * @param RendezVousRepository $repository
     * @return Response
     * @Route ("/ordera",name="ordera")
     */
    public function orderbymail(RendezVousRepository $repository){
        $rendezvous=$repository->orderbymail();
        return $this->render('adminrendezvous/afficherdvadmin.html.twig',array("rendezvous"=>$rendezvous));
    }
    /**
     * @param Request $request
     * @return Response
     * @Route ("/searchrdva",name="searchrdva")
     */
    public function searchrdv(Request $request,RendezVousRepository $rep)
    {
        $repository = $this->getDoctrine()->getRepository(RendezVous::class);
        $requestString=$request->get('searchValue');
        $rdv = $repository->findrdvBydate($requestString);
        return $this->render('rendez_vous/rendezvousajax.html.twig' ,[
            "rendezvous"=>$rdv
        ]);
    }


}
