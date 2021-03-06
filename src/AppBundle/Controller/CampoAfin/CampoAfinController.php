<?php
namespace AppBundle\Controller\CampoAfin;
use AppBundle\Entity\CampoAfin;
use AppBundle\Form\CampoAfinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    /**
     * @Route("/nuevo_campoAfin/{id}/delete", name="delete_campoAfin")
     */
    public function delete_campo(Request $request,CampoAfin $compoAfin)
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



    //postman

    /**
     * @Route("/rest/campoAfin", name="campoAfin_rest", methods={"GET"})
     */
    public function getAllAreasAfines(Request $request)
    {
        $campoafin=$this->getDoctrine()->getRepository(CampoAfin::class)->findAll();

        $campoafin=$this->get('serializer')->serialize($campoafin,'json');

        $dataJson=json_decode($campoafin,true);


        return new JsonResponse($dataJson);
    }

    /**
     * @Route("/rest/campoAfin", name="guardar_campoAfin_rest", methods={"POST"})
     */
    public function crearAreasAfines(Request $request)
    {


        $data=$request->getContent();
        $data=json_decode($data,true);
       //  dump($data);
        // die;

        $campoafin = new CampoAfin();
    //    $campoafin->setNombre($data['nombre']);
        $form= $this->createForm(CampoAfinType::class,$campoafin);
        $form->submit($data);

        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($campoafin);
            $em->flush();

        }else{
            return new JsonResponse(null,400);
        }



        $campoafin=$this->get('serializer')->serialize($campoafin,'json');

        $dataJson=json_decode($campoafin,true);


        return new JsonResponse($dataJson);

    }
}


