<?php

namespace BackendBundle\Entity;

/**
 * TipoSensor
 */
class TipoSensor
{
    /**
     * @var integer
     */
    private $tipoId;

    /**
     * @var string
     */
    private $tipoDescripcion;

    /**
     * @var boolean
     */
    private $eliminarEstado = '0';


    /**
     * Get tipoId
     *
     * @return integer
     */
    public function getTipoId()
    {
        return $this->tipoId;
    }

    /**
     * Set tipoDescripcion
     *
     * @param string $tipoDescripcion
     *
     * @return TipoSensor
     */
    public function setTipoDescripcion($tipoDescripcion)
    {
        $this->tipoDescripcion = $tipoDescripcion;

        return $this;
    }

    /**
     * Get tipoDescripcion
     *
     * @return string
     */
    public function getTipoDescripcion()
    {
        return $this->tipoDescripcion;
    }

    /**
     * Set eliminarEstado
     *
     * @param boolean $eliminarEstado
     *
     * @return TipoSensor
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
}
