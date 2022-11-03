<?php
    class Moto{
        function __construct($marca,$modelo,$valor)
        {
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->valor = $valor;
        }

        function getMarca(){
            return $this->marca;
        }

        function getModelo(){
            return $this->modelo;
        }

        function getValor(){
            return $this->valor;
        }

        private $marca;
        private $modelo;
        private $valor;
    }

?>