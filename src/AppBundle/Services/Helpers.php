<?php
/**
 * Created by PhpStorm.
 * User: abunster
 * Date: 13-09-17
 * Time: 11:52
 */

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class Helpers
{
    public $jwt_auth;

    # CONSTRUCTOR
    public function __construct($jwt_auth)
    {
        $this->jwt_auth = $jwt_auth;
    }

    # ATAJO CHECKEAR TOKENS
    public function checkToken($hash, $getIdentity = false)
    {
        $auth = false;
        if ($hash != null)
        {
            if(!$getIdentity)
            {
                $check_token = $this->jwt_auth->checkToken($hash);
                if ($check_token)
                {
                    $auth = true;
                }
            }
            else
            {
                $check_token = $this->jwt_auth->checkToken($hash, true);
                if (is_object($check_token))
                {
                    $auth = $check_token;
                }
            }
        }
        return $auth;
    }

    # TRANSFORMAR A JSON
    public function json($data)
    {
        $normalizers = array(new GetSetMethodNormalizer());
        $encoders =  array("json" => new JsonEncoder());
        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize($data, "json");
        $response = new Response();
        $response->setContent($json);
        $response->headers->set("Content-Type", "application/json");

        return $response;
    }
}