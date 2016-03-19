<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\TaskType;
use AppBundle\Entity\Task;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/mioform", name="formpage")
     */
    public function  formAction(Request $request){


        $prodotto= new Product();
        $prodotto->setName('valore');
        $prodotto->setDescription('valore2');
        $prodotto->setPrice('valore2');


        $em=$this->getDoctrine()->getManager();
        $em->persist($prodotto);
        $em->flush();


        $task2=new Task();
        $form=$this->createForm(TaskType::class, $task2 );
        return $this->render('default/mio.html.twig', array(
            'form' => $form->createView(),
        ));

       // $form->handleRequest($request);



           /* $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();*/
            //come faccio a prendermi il valore messo nel textbox nome??


         //   return new Response('Creato valore'.$prodotto->getId);


            if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirect($this->generateUrl('admin_post_show',array('id' => $post->getId())));
        }

    }
}
