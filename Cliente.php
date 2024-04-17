<?php
/*
    En la clase Cliente:
*/
class Cliente{
    //0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
    //documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    private $nombre;
    private $apellido;
    private $deBaja;
    private $tipo;
    private $numDocumento;
    //1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    /* 
        @param $nombre STRING
        @param $apellido STRING
        @param $deBaja BOOLEAN
        @param $tipo STRING
        @param $numDocumento INT
    */
    public function __construct($nombre,$apellido,$deBaja,$tipo,$numDocumento){
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> deBaja = $deBaja;
        $this -> tipo = $tipo;
        $this -> numDocumento = $numDocumento;
    }
    //2. Los métodos de acceso de cada uno de los atributos de la clase.
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDeBaja(){
        return $this->deBaja;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getNumDocumento(){
        return $this->numDocumento;
    }
    //3. Redefinir el método _toString para que retorne la información de los atributos de la clase
    public function __toString(){
        $baja = $this -> getDeBaja() == true ? "Si esta de baja" : "No esta de baja";
        $info="\n\n\e[1;37;43mLa informacion del cliente es:\e[0m\n"
        ."\nNombre: ". $this -> getNombre()
        ."\nApellido: ". $this -> getApellido()
        ."\nDe Baja: ". $baja
        ."\nTipo: ". $this -> getTipo()
        ."\nNumumero de Documento: ". $this -> getNumDocumento();
        return $info;
    }
}
