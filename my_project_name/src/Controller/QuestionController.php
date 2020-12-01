<?php

namespace App\Controller;

use App\Entity\Option;
use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{
    private $em;
    public function __construct (EntityManagerInterface $em){
        $this->em=$em;
    }
    /**
     * @Route("/question", name="question")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new_dest( Request $request){

        $q=new Question();
        $q->setTexte("");
        $option = new Option();
        
        $option->setTextOption('');
        $option->setOpt($q);
        $q->addOption($option);
        $option1 = new Option();
        
        $option1->setTextOption('');
        $option1->setOpt($q);
        $q->addOption($option1);
        
        $form= $this->createForm(QuestionType::class, $q);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($q);
            $this->em->flush();
            return $this->redirectToRoute("question");

           
        }
        return $this->render('Question/q.html.twig',[
            'q'=>$q ,
            'form'=>$form->createView()
        ]);
    }
}
