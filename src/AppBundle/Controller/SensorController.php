<?php
/**
 * Created by PhpStorm.
 * User: Alvaro
 * Date: 26/09/2017
 * Time: 10:56
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class SensorController extends Controller
{
    public function getAllAction(Request $request)
    {
        # Usar servicio
        $helpers = $this->get("app.helpers");

        # Probar que el servicio está funcionando
        $em = $this->getDoctrine()->getManager();
        $sensores = $em->getRepository('BackendBundle:Sensor')->findAll();

        return $helpers->json($sensores);
    }

}