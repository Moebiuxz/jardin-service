<?php

namespace BackendBundle\Entity;

/**
 * Sensor
 */
class Sensor
{
    /**
     * @var integer
     */
    private $sensorId;

    /**
     * @var string
     */
    private $sensorModelo;

    /**
     * @var string
     */
    private $sensorDescripcion;

    /**
     * @var boolean
     */
    private $eliminarEstado = '0';

    /**
     * @var \BackendBundle\Entity\TipoSensor
     */
    private $fkSensorTipo;


    /**
     * Get sensorId
     *
     * @return integer
     */
    public function getSensorId()
    {
        return $this->sensorId;
    }

    /**
     * Set sensorModelo
     *
     * @param string $sensorModelo
     *
     * @return Sensor
     */
    public function setSensorModelo($sensorModelo)
    {
        $this->sensorModelo = $sensorModelo;

        return $this;
    }

    /**
     * Get sensorModelo
     *
     * @return string
     */
    public function getSensorModelo()
    {
        return $this->sensorModelo;
    }

    /**
     * Set sensorDescripcion
     *
     * @param string $sensorDescripcion
     *
     * @return Sensor
     */
    public function setSensorDescripcion($sensorDescripcion)
    {
        $this->sensorDescripcion = $sensorDescripcion;

        return $this;
    }

    /**
     * Get sensorDescripcion
     *
     * @return string
     */
    public function getSensorDescripcion()
    {
        return $this->sensorDescripcion;
    }

    /**
     * Set eliminarEstado
     *
     * @param boolean $eliminarEstado
     *
     * @return Sensor
     */
    public function setEliminarEstado($eliminarEstado)
    {
        $this->eliminarEstado = $eliminarEstado;

        return $this;
    }

    /**
     * Get eliminarEstado
     *
     * @return boolean
     */
    public function getEliminarEstado()
    {
        return $this->eliminarEstado;
    }

    /**
     * Set fkSensorTipo
     *
     * @param \BackendBundle\Entity\TipoSensor $fkSensorTipo
     *
     * @return Sensor
     */
    public function setFkSensorTipo(\BackendBundle\Entity\TipoSensor $fkSensorTipo = null)
    {
        $this->fkSensorTipo = $fkSensorTipo;

        return $this;
    }

    /**
     * Get fkSensorTipo
     *
     * @return \BackendBundle\Entity\TipoSensor
     */
    public function getFkSensorTipo()
    {
        return $this->fkSensorTipo;
    }
}
