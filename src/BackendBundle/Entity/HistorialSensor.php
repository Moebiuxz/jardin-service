<?php

namespace BackendBundle\Entity;

/**
 * HistorialSensor
 */
class HistorialSensor
{
    /**
     * @var integer
     */
    private $historialId;

    /**
     * @var float
     */
    private $historialValor;

    /**
     * @var \DateTime
     */
    private $historialFecha;

    /**
     * @var boolean
     */
    private $eliminarEstado = '0';

    /**
     * @var \BackendBundle\Entity\Sensor
     */
    private $fkSensor;


    /**
     * Get historialId
     *
     * @return integer
     */
    public function getHistorialId()
    {
        return $this->historialId;
    }

    /**
     * Set historialValor
     *
     * @param float $historialValor
     *
     * @return HistorialSensor
     */
    public function setHistorialValor($historialValor)
    {
        $this->historialValor = $historialValor;

        return $this;
    }

    /**
     * Get historialValor
     *
     * @return float
     */
    public function getHistorialValor()
    {
        return $this->historialValor;
    }

    /**
     * Set historialFecha
     *
     * @param \DateTime $historialFecha
     *
     * @return HistorialSensor
     */
    public function setHistorialFecha($historialFecha)
    {
        $this->historialFecha = $historialFecha;

        return $this;
    }

    /**
     * Get historialFecha
     *
     * @return \DateTime
     */
    public function getHistorialFecha()
    {
        return $this->historialFecha;
    }

    /**
     * Set eliminarEstado
     *
     * @param boolean $eliminarEstado
     *
     * @return HistorialSensor
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
     * Set fkSensor
     *
     * @param \BackendBundle\Entity\Sensor $fkSensor
     *
     * @return HistorialSensor
     */
    public function setFkSensor(\BackendBundle\Entity\Sensor $fkSensor = null)
    {
        $this->fkSensor = $fkSensor;

        return $this;
    }

    /**
     * Get fkSensor
     *
     * @return \BackendBundle\Entity\Sensor
     */
    public function getFkSensor()
    {
        return $this->fkSensor;
    }
}
