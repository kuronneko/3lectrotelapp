<?php


class estadistica
{
private $reporte = array();

    /**
     * estadistica constructor.
     * @param array $reporte
     */
        public function __construct()
    {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct1(array $reporte)
    {
        $this->reporte = $reporte;
    }

    /**
     * @return array
     */
    public function getReporte()
    {
        return $this->reporte;
    }

    /**
     * @param array $reporte
     */
    public function setReporte($reporte)
    {
        $this->reporte = $reporte;
    }


}