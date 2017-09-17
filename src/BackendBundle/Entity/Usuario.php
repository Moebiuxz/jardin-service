<?php

namespace BackendBundle\Entity;

/**
 * Usuario
 */
class Usuario
{
    /**
     * @var string
     */
    private $usuarioRut;

    /**
     * @var string
     */
    private $usuarioNombre;

    /**
     * @var string
     */
    private $usuarioApellido;

    /**
     * @var boolean
     */
    private $eliminarEstado = '0';

    /**
     * Set usuarioRut
     *
     * @param string $usuarioRut
     *
     * @return Usuario
     */
    public function setUsuarioRut($usuarioRut)
    {
        $this->usuarioRut = $usuarioRut;

        return $this;
    }

    /**
     * Get usuarioRut
     *
     * @return string
     */
    public function getUsuarioRut()
    {
        return $this->usuarioRut;
    }

    /**
     * Set usuarioNombre
     *
     * @param string $usuarioNombre
     *
     * @return Usuario
     */
    public function setUsuarioNombre($usuarioNombre)
    {
        $this->usuarioNombre = $usuarioNombre;

        return $this;
    }

    /**
     * Get usuarioNombre
     *
     * @return string
     */
    public function getUsuarioNombre()
    {
        return $this->usuarioNombre;
    }

    /**
     * Set usuarioApellido
     *
     * @param string $usuarioApellido
     *
     * @return Usuario
     */
    public function setUsuarioApellido($usuarioApellido)
    {
        $this->usuarioApellido = $usuarioApellido;

        return $this;
    }

    /**
     * Get usuarioApellido
     *
     * @return string
     */
    public function getUsuarioApellido()
    {
        return $this->usuarioApellido;
    }

    /**
     * Set eliminarEstado
     *
     * @param boolean $eliminarEstado
     *
     * @return Usuario
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

