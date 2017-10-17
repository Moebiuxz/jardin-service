<?php
/**
 * Created by PhpStorm.
 * User: Alvaro
 * Date: 26/09/2017
 * Time: 11:13
 */

namespace AppBundle\Controller;

use BackendBundle\Entity\HistorialSensor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class HistorialSensorController extends Controller
{
    public function getAllAction(Request $request)
    {
        # Usar servicio
        $helpers = $this->get("app.helpers");

        # Probar que el servicio está funcionando
        $em = $this->getDoctrine()->getManager();
        $historialSensores = $em->getRepository('BackendBundle:HistorialSensor')->findAll();

        return $helpers->json($historialSensores);
    }

    # INGRESO POR GET
    public function newValueAction($temp, $humedad)
    {
        # INSERT PARA ALMACENAR LA TEMPERATURA
        $raw_query = "INSERT INTO historial_sensor (historial_valor, historial_fecha, fk_sensor) VALUES ($temp, now(), 2)";

        # Obtener el manager
        $em = $this->getDoctrine()->getManager();
        $statement = $em->getConnection()->prepare($raw_query);
        $statement->execute();

        # INSERT PARA ALMACENAR LA HUMEDAD
        $raw_query = "INSERT INTO historial_sensor (historial_valor, historial_fecha, fk_sensor) VALUES ($humedad, now(), 1)";
        $statement = $em->getConnection()->prepare($raw_query);
        $statement->execute();

        die();
    }
}