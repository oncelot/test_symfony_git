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
     * @Route("/no", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/mio.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    /**
    * @Route("/admin_post_show", name="admin_post_show")
     */
    public function test_adminAction(Request $request){
        //inserimento andato a buon fine

        $prodotto=new Product();
        $em= $this->getDoctrine()->getRepository('AppBundle:Product');
        $elenco=$em->findAll();

        return $this->render('default/ris_insert.html.twig', array('ris'=>$elenco));





    }

    /**
     * @Route("/", name="formpage")
     */
    public function  formAction(Request $request){


        $task2=new Task();
        $form=$this->createForm(TaskType::class, $task2 );



        $form->handleRequest($request);

           /* $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();*/
            //come faccio a prendermi il valore messo nel textbox nome??


         //   return new Response('Creato valore'.$prodotto->getId);

            if ($form->isSubmitted() && $form->isValid()) {

                $prodotto= new Product();
                $prodotto->setName($task2->getNome());
                $prodotto->setDescription($task2->getCognome());
                $prodotto->setPrice(1);


                $em=$this->getDoctrine()->getManager();
                $em->persist($prodotto);
                $em->flush();


            return $this->redirect($this->generateUrl('admin_post_show'));
        }
        return $this->render('default/mio.html.twig', array(
            'form' => $form->createView(),
        ));


    }
}
