<?php
namespace AppBundle\Controller\Estado;
use AppBundle\Entity\Estado;
use AppBundle\Form\EstadoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EstadoController extends Controller
{
    /**
     * @Route("/estado", name="estado")
     */
    public function indexAction(Request $request)
    {
        $estado=$this->getDoctrine()->getRepository(Estado::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Estado/lista_estado.html.twig',['lista_datos'=>$estado]);
    }


    /**
     * @Route("/nuevo_estado", name="nuevo_estado")
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
     * @Route("/nuevo_estado/{id}/edit", name="edit_estado")
     */
    public function edit_campo(Request $request,Estado $compoAfin)
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

    /**
     * @Route("/nuevo_campoAfin/{id}/delete", name="delete_campoAfin")
     */
    public function delete_campo(Request $request,Estado $compoAfin)
    {


      //  $form = $this->createForm( CampoAfinType::class, $compoAfin);
//       $form->handleRequest($request);
//        if($form->isSubmitted() && $form->isValid())
//        {

            $em=$this->getDoctrine()->getManager();
            $em->remove($compoAfin);
            $em->flush();
            return $this->redirectToRoute('campoAfin');
      //  }
        // replace this example code with whatever you need
        return $this->render('@App/CampoAfin/crear_campoafin.html.twig', [
            'form'=>$form->createView()
        ]);
    }

}