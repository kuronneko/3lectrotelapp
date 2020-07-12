<?php


class item
{
private $id;
private $nombre;
private $categoria;
private $administrador;
private $nro_serie;
private $fabricante;
private $precio;
private $phourl;

    /**
     * item constructor.
     * @param $id
     * @param $nombre
     * @param $categoria
     * @param $administrador
     * @param $nro_serie
     * @param $fabricante
     * @param $precio
     * @param $phourl
     */
        public function __construct()
    {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct1($id, $nombre, $categoria, $administrador, $nro_serie, $fabricante, $precio, $phourl)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->administrador = $administrador;
        $this->nro_serie = $nro_serie;
        $this->fabricante = $fabricante;
        $this->precio = $precio;
        $this->phourl = $phourl;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getAdministrador()
    {
        return $this->administrador;
    }

    /**
     * @param mixed $administrador
     */
    public function setAdministrador($administrador)
    {
        $this->administrador = $administrador;
    }

    /**
     * @return mixed
     */
    public function getNroSerie()
    {
        return $this->nro_serie;
    }

    /**
     * @param mixed $nro_serie
     */
    public function setNroSerie($nro_serie)
    {
        $this->nro_serie = $nro_serie;
    }

    /**
     * @return mixed
     */
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * @param mixed $fabricante
     */
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getPhourl()
    {
        return $this->phourl;
    }

    /**
     * @param mixed $phourl
     */
    public function setPhourl($phourl)
    {
        $this->phourl = $phourl;
    }


}