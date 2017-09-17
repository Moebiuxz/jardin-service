<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    # LOGIN
    public function loginAction(Request $request)
    {
        # Usar servicio
        $helpers = $this->get("app.helpers");
        $jwt_auth = $this->get("app.jwt_auth");

        # Recibir Json por POST
        $json = $request->get("json", null);

        if ($json != null)
        {
            $params = json_decode($json); /*recibir como parametros*/
            $rut = (isset($params->rut)) ? $params->rut : null;
            $clave = (isset($params->clave)) ? $params->clave : null;
            $getHash = (isset($params->getHash)) ? $params->getHash : null;

            if ($rut != null && $clave != null)
            {
                # retorno como hash opcional

                if ($getHash == null)
                {
                    $signup = $jwt_auth->signup($rut, $clave /*, "hash"*/);
                }
                else
                {
                    $signup = $jwt_auth->signup($rut, $clave, true);
                }

                return new JsonResponse($signup);
            }
            else{
                return $helpers->json(array(
                    "status" => "error",
                    "data" => "login not valid!!"
                ));
            }
        }
        else
        {
            return $helpers->json(array(
                "status" => "error",
                "data" => "send json with post!!"
            ));
        }
    }

    public function pruebasAction(Request $request)
    {
        # Usar servicio
        $helpers = $this->get("app.helpers");

        # Probar el check token
        //$hash = $request->get("authorization", null);
        //$check = $helpers->checkToken($hash, true);
        //var_dump($check);
        //die();

        # Probar que el servicio está funcionando
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('BackendBundle:Usuario')->findAll();

        return $helpers->json($users);

    }
}