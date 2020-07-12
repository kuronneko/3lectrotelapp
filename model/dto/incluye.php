<?php


class incluye
{
    private $reporte;
    private $item = array();
    private $cantidad;

    /**
     * incluye constructor.
     * @param $reporte
     * @param array $item
     * @param $cantidad
     */

    public function __construct()
    {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct1($reporte, array $item, $cantidad)
    {
        $this->reporte = $reporte;
        $this->item = $item;
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getReporte()
    {
        return $this->reporte;
    }

    /**
     * @param mixed $reporte
     */
    public function setReporte($reporte)
    {
        $this->reporte = $reporte;
    }

    /**
     * @return array
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param array $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }



}