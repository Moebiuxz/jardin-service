<?php

namespace BackendBundle\Entity;

/**
 * Cuenta
 */
class Cuenta
{
    /**
     * @var integer
     */
    private $cuentaId;

    /**
     * @var string
     */
    private $cuentaClave;

    /**
     * @var boolean
     */
    private $eliminarEstado = '0';

    /**
     * @var \BackendBundle\Entity\Usuario
     */
    private $fkUsuarioRut;

    /**
     * @var \BackendBundle\Entity\TipoCuenta
     */
    private $fkCuentaTipo;


    /**
     * Get cuentaId
     *
     * @return integer
     */
    public function getCuentaId()
    {
        return $this->cuentaId;
    }

    /**
     * Set cuentaClave
     *
     * @param string $cuentaClave
     *
     * @return Cuenta
     */
    public function setCuentaClave($cuentaClave)
    {
        $this->cuentaClave = $cuentaClave;

        return $this;
    }

    /**
     * Get cuentaClave
     *
     * @return string
     */
    public function getCuentaClave()
    {
        return $this->cuentaClave;
    }

    /**
     * Set eliminarEstado
     *
     * @param boolean $eliminarEstado
     *
     * @return Cuenta
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
     * Set fkUsuarioRut
     *
     * @param \BackendBundle\Entity\Usuario $fkUsuarioRut
     *
     * @return Cuenta
     */
    public function setFkUsuarioRut(\BackendBundle\Entity\Usuario $fkUsuarioRut = null)
    {
        $this->fkUsuarioRut = $fkUsuarioRut;

        return $this;
    }

    /**
     * Get fkUsuarioRut
     *
     * @return \BackendBundle\Entity\Usuario
     */
    public function getFkUsuarioRut()
    {
        return $this->fkUsuarioRut;
    }

    /**
     * Set fkCuentaTipo
     *
     * @param \BackendBundle\Entity\TipoCuenta $fkCuentaTipo
     *
     * @return Cuenta
     */
    public function setFkCuentaTipo(\BackendBundle\Entity\TipoCuenta $fkCuentaTipo = null)
    {
        $this->fkCuentaTipo = $fkCuentaTipo;

        return $this;
    }

    /**
     * Get fkCuentaTipo
     *
     * @return \BackendBundle\Entity\TipoCuenta
     */
    public function getFkCuentaTipo()
    {
        return $this->fkCuentaTipo;
    }
}
