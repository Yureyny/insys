<?php
namespace AppBundle\Controller\CampoAfin;
use AppBundle\Entity\CampoAfin;
use AppBundle\Form\CampoAfinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CampoAfinController extends Controller
{
    /**
     * @Route("/campoAfin", name="campoAfin")
     */
    public function indexAction(Request $request)
    {
        $campoafin=$this->getDoctrine()->getRepository(CampoAfin::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/CampoAfin/registro_campoafin.html.twig',['lista_datos'=>$campoafin]);
    }


    /**
     * @Route("/nuevo_campoAfin", name="nuevo_campoAfin")
     */
    public function nuevo_campo(Request $request)
    {
        $campoafin = new CampoAfin();
        $form = $this->createForm( CampoAfinType::class, $campoafin);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

            $em=$this->getDoctrine()->getManager();
            $em->persist($campoafin);
            $em->flush();
            return $this->redirectToRoute('campoAfin');
        }
        // replace this example code with whatever you need
        return $this->render('@App/CampoAfin/crear_campoafin.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/nuevo_campoAfin/{id}/edit", name="edit_campoAfin")
     */
    public function edit_campo(Request $request,CampoAfin $compoAfin)
    {


        $form = $this->createForm( CampoAfinType::class, $compoAfin);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('campoAfin');
        }
        // replace this example code with whatever you need
        return $this->render('@App/CampoAfin/crear_campoafin.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}