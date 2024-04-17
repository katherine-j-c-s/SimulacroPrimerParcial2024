<?php
/*
    En la clase Venta:
*/
class Venta{
    //Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
    //motos y el precio final.
    private $numero;
    private $fecha;
    private $referenciaCliente;
    private $referenciaColeccionMotos;
    private $precioFinal;
    //2. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    /* 
        @param $numero INT
        @param $fecha INT
        @param $referenciaCliente STRING
        @param $referenciaColeccionMotos STRING
        @param $precioFinal INT
    */
    public function __construct($numero,$fecha,$referenciaCliente,$referenciaColeccionMotos,$precioFinal){
        $this -> numero = $numero;
        $this -> fecha = $fecha;
        $this -> referenciaCliente = $referenciaCliente;
        $this -> referenciaColeccionMotos = $referenciaColeccionMotos;
        $this -> precioFinal = $precioFinal;
    }
    //3. Los métodos de acceso de cada uno de los atributos de la clase.
    public function getNumero(){
        return $this->numero;
    }
    public function getfecha(){
        return $this->fecha;
    }
    public function getReferenciaCliente(){
        return $this->referenciaCliente;
    }
    public function getReferenciaColeccionMotos(){
        return $this->referenciaColeccionMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }
    /*
     4. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
        incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
        vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
        Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
    */
    //@param $objMoto OBJ
    public function incorporarMoto($objMoto){
        if($objMoto->getActiva() == true){
            array_push($this->referenciaColeccionMotos,$objMoto);
            $agregarPrecio= $objMoto->darPrecioVenta();
            $this->precioFinal+=$agregarPrecio;
        }
    }
    //5. Redefinir el método _toString para que retorne la información de los atributos de la clase
    public function __toString(){
        $info="\n\n\e[1;37;43mLa informacion de la venta es:\e[0m"
        ."\nNumero: ". $this -> getNumero()
        ."\nFecha: ". $this -> getfecha()
        ."\n\n\e[1;37;42mReferencia de cliente: \e[0m". $this -> getReferenciaCliente()
        ."\n\n\e[1;37;42mReferencia de Coleccion de Motos:\e[0m\n";
        if(count($this -> getReferenciaColeccionMotos()) > 0){
            foreach ($this -> getReferenciaColeccionMotos() as $moto) {
                $info.=$moto;
            }
        }else{
            $info.="NO COMPRO NINGUNA MOTO";
        }
       
        $info.="\n\e[1;37;42mPrecio Final: \e[0m". $this -> getPrecioFinal();
        return $info;
    }
}
