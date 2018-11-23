<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
//Pasarle los datos para insertar
        $usuario= new Usuario();
        $usuario->setNombre('Juan');
        $usuario->setApellido('De los Palotes');
        $usuario->setEmail('juan@gmail.com');
        $usuario->setHabilitado(true);
        $usuario->setPassword('1234');

        //para conectarse a la base de datos y hacer commit en la bd
    //   $em= $this->getDoctrine()->getManager();
     //  $em->persist($usuario);
      // $em->flush();


        // replace this example code with whatever you need
        return $this->render('default/plantilla.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/{id}", name="homepage2")
     *
     * @param Request $request
     * @param Request $usuario
     */
    public function index2Action(Request $request,Usuario $usuario)
    {
      //  dump($id);
    //    die;

        // replace this example code with whatever you need
      //  return $this->render('@App/Usuario/ver_usuario.html.twig',["usuario"=>$usuario]);

        return $this->render('@App/Usuario/ver_usuario.html.twig',["usuarios"=>[$usuario]]);
    }
}
