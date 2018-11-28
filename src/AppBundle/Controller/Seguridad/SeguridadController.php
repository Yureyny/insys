<?php
namespace AppBundle\Controller\Seguridad;
use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/login")
 */
class SeguridadController extends Controller
{
    /**
     * @Route("/", name="login")
     */
    public function indexAction(Request $request)
    {
//        $usuario = new Usuario();
//        $usuario->setNombre("Juan");
//        $usuario->setApellido("De los palotes");
//        $usuario->setEmail("juanp@gmail.com");
//        $usuario->setPassword("3333");
//        $usuario->setHabilitado(true);
//
//        $manejadorDb = $this->getDoctrine() ->getManager();
//        $manejadorDb->persist($usuario);
//        $manejadorDb->flush();
     //   $usuarios = $this->getDoctrine()->getRepository(Usuario::class)->findAll();
        // replace this example code with whatever you need
        return $this->render('@App/Seguridad/login.html.twig');
    }
}
