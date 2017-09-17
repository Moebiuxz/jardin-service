<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    public function newAction(Request $request)
    {
        $helpers = $this->get("app.helpers");

        # Recoger los datos que llegan por POST
        $json = $request->get("json", null);

        # Decodificar el Json
        $params = json_decode($json);

        if ($json != null)
        {
            // $createdAt = new \DateTime("now");
            $rut = (isset($params->rut)) ? $params->rut : null;

            # Para verificar que sea solo letras utilizar ctype_alpha(atributo);
            $nombre = (isset($params->nombre) && ctype_alpha($params->nombre)) ? $params->nombre : null;
            $apellido = (isset($params->apellido) && ctype_alpha($params->apellido)) ? $params->apellido: null;

            # Inicializar el arreglo
            $data = array();

            # Verificar que ningun parametro venga "vacío";
            if ($rut != null && $nombre != null && $apellido != null)
            {
                $usuario = new Usuario();

                $usuario->setUsuarioRut($rut);
                $usuario->setUsuarioNombre($nombre);
                $usuario->setUsuarioApellido($apellido);

                # Obtener el manager
                $em = $this->getDoctrine()->getManager();

                # Validar que no exista el usuario en la DB
                $isset_usuario = $em->getRepository("BackendBundle:Usuario")->findBy(
                    array(
                        "usuarioRut" => $rut
                    )
                );

                if (count($isset_usuario) == 0)
                {
                    # Guardar los datos en la entidad de forma definitiva.
                    $em->persist($usuario);

                    # Volcar los datos en la base de datos.
                    $em->flush();

                    $data["status"] = "success";
                    $data["msg"] = "Nuevo usuario creado!!";
                }
                else
                {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Usuario no creado, ya existe!!"
                    );
                }

            }
            else
            {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Campo null!!"
                );
            }

        }
        else
        {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "User not created"
            );

        }
        return $helpers->json($data);
    }
}