<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Entity\DocumentCompany;
use App\Entity\VehiculeCompany;
use App\Form\VehiculeCompanyFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthentificationController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('authentification/index.html.twig', [
            'controller_name' => 'AuthentificationController',
        ]);
    }
    /**
     * @Route("/login", name="login", methods={"GET", "POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('authentification/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout(): void{
        
    }
    /**
     * @Route("/authentification/register", name="registerCompany") 
     */
    public function register(Request $request): Response
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class,$company);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->container->get('session')->set('company', $company);
            return $this->redirectToRoute('registerDocument');
        }
        return $this->render('authentification/register.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/authentification/register/document", name="registerDocument") 
     */
    public function registerDocument(Request $request): Response
    {
        $company = $this->container->get('session')->get('company',false);
        if(!$company){
            return $this->redirectToRoute('registerCompany');
        }
        $document = null;
        $form = $this->createFormBuilder($document)
        ->add('KBIS',FileType::class)
        ->add('Assurance_RC',FileType::class)
        ->add('date_validite',DateType::class,['attr'=>['id'=>'datepicker']])
        ->add("Suivant",SubmitType::class)
        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            
            $KBIS = new DocumentCompany();
            $KBIS->setName("KBIS");
            $KBIS->setDescription("empty");
            $KBIS->setStatue("statue");
            $KBIS->setDateInsert(new \DateTime());
            $dir = 'Document';
            $newFilename = uniqid().'-'.$form['KBIS']->getData()->getClientOriginalName();
            $form['KBIS']->getData()->move($dir,$newFilename);
            $entityManager = $this->getDoctrine()->getManager();
            $KBIS->setPathDoc("/Documents/".$newFilename);
            $KBIS->setSupportId(0);
            $company->addDocument($KBIS);
            $entityManager->persist($KBIS);$entityManager->persist($company);
            $entityManager->flush();
            $this->container->get('session')->invalidate();
            $this->container->get('session')->set('companyanddocument', $company);
            return $this->redirectToRoute('registerCar');
        }else if($form->isSubmitted() && !$form->isValid()){
            return $this->redirectToRoute('login');
        }
        
        return $this->render('authentification/registerdocument.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/authentification/register/car", name="registerCar") 
     */
    public function registerCar(Request $request):Response
    {
        $vehicule = new VehiculeCompany();
        $form = $this->createForm(VehiculeCompanyFormType::class);
        return $this->render("authentification/registercar.html.twig",[
            'form'=>$form->createView()
        ]);
    }
}
