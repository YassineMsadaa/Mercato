<?php

namespace App\Controller;


use App\Entity\User;

use App\Form\UserType;
use App\Repository\UserRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use phpDocumentor\Reflection\DocBlock\Serializer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Loader\XmlFileLoader;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class UserController extends AbstractController
{




/* /**
     * @Route("/lol1", name="lol1")

    public function manager(): Response
    {

        $rep=$this->getDoctrine()->getRepository(User::class);
        $user=$rep->findAll();



        return $this->render('user/companymanager.html.twig', [
            'user' => $user,
        ]);
    }*/


    /**
     * @Route("/userfront", name="userfront")
     */
    public function new1(Request $request)
    {
        $user =new User();
        $form = $this->createForm(UserType::class, $user);
        $form->add('save',SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->flush();
            //mailing
            $mail = new PHPMailer(true);

            try {

                $Username = $form->get('username')->getData();


                $email = $form->get('emailadresse')->getData();


                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'souissieya2018@gmail.com';             // SMTP username
                $mail->Password   = 'Youyou2020';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                //Recipients
                $mail->setFrom('nour.zidi@esprit.tn', 'mercato User');
                $mail->addAddress($email, 'mercato user');     // Add a recipient

                // Content
                $corps="Bonjour Monsieur/Madame  ".$Username. "voici votre copie de vos informations  est comme suite"  ;
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Sois le Bienvenue!';
                $mail->Body    = $corps;

                $mail->send();

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            //end mailing
            return $this->redirectToRoute('lol1');

        }
        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/lol1", name="lol1")
     */
    public function manager(): Response
    {

        $rep=$this->getDoctrine()->getRepository(User::class);
        $user=$rep->findAll();



        return $this->render('user/companymanager.html.twig', [
            'user' => $user,
        ]);
    }
    /**
     * @Route("/company_index", name="company_index")

     */
    public function index3(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'user' => $userRepository->findAll(),
        ]);
    }
    /**
     * @Route("/companyeditm{id}", name="companyeditm")
     */
    public function edit(Request $request, User $user)
    {
        $form = $this->createForm(UserType::class, $user);
        $form->add('save',SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lol1');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/listu1", name="listu1", methods={"GET"})
     */
    public function listu1(UserRepository $userRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('user\pdf.html.twig', [
            'users' =>$userRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A2', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }
    /**
     * @Route("/company_show{id}", name="company_show")
     */
    public function show(int $id): Response
    {
        $rep=$this->getDoctrine()->getRepository(User::class);
        $entityManager = $this->getDoctrine()->getManager();

        $user=$rep->find($id);


        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);}
    /**
     * @Route("/sortbytitleasc", name="sortbytitleasc")
     */
    public function sortByTitleASC(): Response
    {

        $rep=$this->getDoctrine()->getRepository(User::class);
        $user=$rep->sortByTitleASC();


        return $this->render('user/companymanager.html.twig', [
            'user' => $user,
        ]);
    }
    /**
     * @Route("/company_detele{id}", name="company_delete")
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lol1');
    }
    /**
     * @Route("/usera", name="usera")
     */
    public function new2(Request $request)
    {
        $user =new User();
        $form = $this->createForm(UserType::class, $user);
        $form->add('save',SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('lol1');

        }
        return $this->render('user/ajoutmanager.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }






}
