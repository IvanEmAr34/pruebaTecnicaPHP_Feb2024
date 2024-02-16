<?php
class Coche
{
    public $marca;
    public $modelo;

    public function __construct($marca, $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function mostrarInformacion()
    {
        echo "Marca: " . $this->marca . "<br>";
        echo "Modelo: " . $this->modelo . "<br>";
    }
}
