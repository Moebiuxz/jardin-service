<?php
/**
 * Created by PhpStorm.
 * User: abunster
 * Date: 13-09-17
 * Time: 12:18
 */

namespace AppBundle\Services;

use Firebase\JWT\JWT;

class JwtAuth
{
    public $manager;
    public $key;

    public function __construct($manager)
    {
        $this->manager = $manager;
        $this->key = "clave-secreta";
    }

    public function signup($rut, $clave, $getHash = null)
    {
        $user = $this->manager->getRepository('BackendBundle:Cuenta')->findOneBy(
            array(
                "fkUsuarioRut" => $rut,
                "cuentaClave" => $clave
            )
        );

        $signup = false;
        if (is_object($user))
        {
            $signup = true;
        }

        if ($signup)
        {
            # Generar token
            $token = array(
                "sub" => $user->getCuentaId(), /*identificador*/
                "rut" => $user->getFkUsuarioRut()->getUsuarioRut(),
                "clave" => $user->getCuentaClave(),
                "tipoCuenta" => $user->getFkCuentaTipo()->getTipoDescripcion(),
                "iat" => time(), /*cuando se ha creado el token*/
                "exp" => time() + (7*24*60*60) /*expiracion (1 semana)*/
            );

            # Pasar el token, la key definida anteriormente y el hash
            $jwt = JWT::encode($token, $this->key, 'HS256');

            # Decodificar el hash
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));

            if ($getHash != null)
            {
                return $jwt;
            }
            else
            {
                return $decoded;
            }
            /*
            return array(
                "status" => "success",
                "data" => "login success!"
            );
            */
        }
        else
        {
            return array(
                "status" => "error",
                "data" => "login failed!"
            );
        }
    }

    public function checkToken($jwt, $getIdentity = false)
    {
        # por si el token es incorrecto
        $auth = false;

        try
        {
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        }
        catch (\UnexpectedValueException $e)
        {
            $auth = false;

        }
        catch (\DomainException $e)
        {
            $auth = false;
        }

        if (isset($decoded->sub))
        {
            $auth = true;
        }
        else
        {
            $auth = false;
        }

        if ($getIdentity)
        {
            return $decoded;
        }
        else
        {
            return $auth;
        }
    }
}