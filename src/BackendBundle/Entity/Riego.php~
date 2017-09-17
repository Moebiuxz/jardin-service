<?php

namespace BackendBundle\Entity;

/**
 * Riego
 */
class Riego
{
    /**
     * @var integer
     */
    private $riegoId;

    /**
     * @var \DateTime
     */
    private $riegoFecha;

    /**
     * @var float
     */
    private $riegoTemperatura;

    /**
     * @var float
     */
    private $riegoHumedad;

    /**
     * @var boolean
     */
    private $eliminarEstado = '0';

    /**
     * @var \BackendBundle\Entity\TipoRiego
     */
    private $fkRiegoTipo;

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $fkRiegoUsuario;


    /**
     * Get riegoId
     *
     * @return integer
     */
    public function getRiegoId()
    {
        return $this->riegoId;
    }

    /**
     * Set riegoFecha
     *
     * @param \DateTime $riegoFecha
     *
     * @return Riego
     */
    public function setRiegoFecha($riegoFecha)
    {
        $this->riegoFecha = $riegoFecha;

        return $this;
    }

    /**
     * Get riegoFecha
     *
     * @return \DateTime
     */
    public function getRiegoFecha()
    {
        return $this->riegoFecha;
    }

    /**
     * Set riegoTemperatura
     *
     * @param float $riegoTemperatura
     *
     * @return Riego
     */
    public function setRiegoTemperatura($riegoTemperatura)
    {
        $this->riegoTemperatura = $riegoTemperatura;

        return $this;
    }

    /**
     * Get riegoTemperatura
     *
     * @return float
     */
    public function getRiegoTemperatura()
    {
        return $this->riegoTemperatura;
    }

    /**
     * Set riegoHumedad
     *
     * @param float $riegoHumedad
     *
     * @return Riego
     */
    public function setRiegoHumedad($riegoHumedad)
    {
        $this->riegoHumedad = $riegoHumedad;

        return $this;
    }

    /**
     * Get riegoHumedad
     *
     * @return float
     */
    public function getRiegoHumedad()
    {
        return $this->riegoHumedad;
    }

    /**
     * Set eliminarEstado
     *
     * @param boolean $eliminarEstado
     *
     * @return Riego
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
     * Set fkRiegoTipo
     *
     * @param \BackendBundle\Entity\TipoRiego $fkRiegoTipo
     *
     * @return Riego
     */
    public function setFkRiegoTipo(\BackendBundle\Entity\TipoRiego $fkRiegoTipo = null)
    {
        $this->fkRiegoTipo = $fkRiegoTipo;

        return $this;
    }

    /**
     * Get fkRiegoTipo
     *
     * @return \BackendBundle\Entity\TipoRiego
     */
    public function getFkRiegoTipo()
    {
        return $this->fkRiegoTipo;
    }

    /**
     * Set fkRiegoUsuario
     *
     * @param \BackendBundle\Entity\Usuario $fkRiegoUsuario
     *
     * @return Riego
     */
    public function setFkRiegoUsuario(\BackendBundle\Entity\Usuario $fkRiegoUsuario = null)
    {
        $this->fkRiegoUsuario = $fkRiegoUsuario;

        return $this;
    }

    /**
     * Get fkRiegoUsuario
     *
     * @return \BackendBundle\Entity\Usuario
     */
    public function getFkRiegoUsuario()
    {
        return $this->fkRiegoUsuario;
    }
}
