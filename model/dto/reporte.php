<?php


class reporte
{
private $id;
private $fecha;
private $comentario;
private $tecnico;
private $localizacion;
private $labor;

    /**
     * reporte constructor.
     * @param $id
     * @param $fecha
     * @param $comentario
     * @param $tecnico
     * @param $localizacion
     * @param $labor
     */

    public function __construct()
    {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct1($id, $fecha, $comentario, $tecnico, $localizacion, $labor)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->comentario = $comentario;
        $this->tecnico = $tecnico;
        $this->localizacion = $localizacion;
        $this->labor = $labor;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * @param mixed $tecnico
     */
    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;
    }

    /**
     * @return mixed
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * @param mixed $localizacion
     */
    public function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;
    }

    /**
     * @return mixed
     */
    public function getLabor()
    {
        return $this->labor;
    }

    /**
     * @param mixed $labor
     */
    public function setLabor($labor)
    {
        $this->labor = $labor;
    }


}