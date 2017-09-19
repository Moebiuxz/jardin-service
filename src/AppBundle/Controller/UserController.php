<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Cuenta;
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

            $clave = (isset($params->clave)) ? $params->clave : null;
            $tipo = (isset($params->tipo)) ? $params->tipo : null;

            # Inicializar el arreglo
            $data = array();

            # Verificar que ningun parametro venga "vacío";
            if ($rut != null && $nombre != null && $apellido != null && $clave != null && $tipo != null)
            {
                # Instanciar usuario
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
                    # Guardar los datos en la entidad usuario de forma definitiva.
                    $em->persist($usuario);
                    # Volcar los datos en la base de datos.
                    $em->flush();

                    #Instanciar cuenta
                    $cuenta = new Cuenta();
                    $cuenta->setFkUsuarioRut($usuario);

                    # Obtener la instancia del tipo de cuenta
                    $tipoCuenta = $em->getRepository("BackendBundle:TipoCuenta")->findBy(
                        array(
                            "tipoId" => $tipo
                        )
                    );
                    $cuenta->setFkCuentaTipo($tipoCuenta[0]);

                    # Cifrar la contraseña
                    $pwd = hash('sha256', $clave);
                    $cuenta->setCuentaClave($pwd);

                    # Guardar los datos en la entidad cuenta de forma definitiva.
                    $em->persist($cuenta);
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

    public function editAction(Request $request)
    {
        $helpers = $this->get("app.helpers");

        # Recoger el token que viene por POST
        $hash = $request->get("authorization", null);

        # Verificar el token
        $authCheck = $helpers->checkToken($hash);

        if ($authCheck)
        {
            # Obtener los datos limpios del usuario que ha hecho la petición
            $identity = $helpers->checkToken($hash, true);



            # Recoger el json que viene por POST
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

                $clave = (isset($params->clave)) ? $params->clave : null;
                $tipo = (isset($params->tipo)) ? $params->tipo : null;

                # Inicializar el arreglo
                $data = array();

                # Verificar que ningun parametro venga "vacío";
                if ($nombre != null && $apellido != null && $tipo != null)
                {
                    # Obtener el usuario que tenga el id que viene en sub
                    $em = $this->getDoctrine()->getManager();
                    $usuario = $em->getRepository("BackendBundle:Usuario")->findOneBy(
                        array(
                            "usuarioRut" => $rut
                        )
                    );


                    # No se instancia el usuario al actualizarlo
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

                    if (count($isset_usuario) != 0 || $identity->rut == $rut)
                    {
                        # Guardar los datos en la entidad usuario de forma definitiva.
                        $em->persist($usuario);
                        # Volcar los datos en la base de datos.
                        $em->flush();

                        # Obtener cuenta
                        $cuenta = $em->getRepository("BackendBundle:Cuenta")->findOneBy(
                            array(
                                "fkUsuarioRut" => $rut
                            )
                        );
                        $cuenta->setFkUsuarioRut($usuario);

                        # Obtener la instancia del tipo de cuenta
                        $tipoCuenta = $em->getRepository("BackendBundle:TipoCuenta")->findOneBy(
                            array(
                                "tipoId" => $tipo
                            )
                        );
                        $cuenta->setFkCuentaTipo($tipoCuenta);

                        if ($clave != null)
                        {
                            # Cifrar la contraseña
                            $pwd = hash('sha256', $clave);
                            $cuenta->setCuentaClave($pwd);
                        }


                        # Guardar los datos en la entidad cuenta de forma definitiva.
                        $em->persist($cuenta);
                        # Volcar los datos en la base de datos.
                        $em->flush();

                        $data["status"] = "success";
                        $data["code"] = "200";
                        $data["msg"] = "Usuario actualizado!!";
                    }
                    else
                    {
                        $data = array(
                            "status" => "error",
                            "code" => 400,
                            "msg" => "Usuario no actualizado!!"
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
        }
        else
        {
            $data = array();
            $data["status"] = "error";
            $data["code"] = 400;
            $data["msg"] = "Autorización no válida!";
        }

        return $helpers->json($data);
    }
}