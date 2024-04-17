<?php
/*
    En la clase Moto:
*/
class Moto{
    //1. Se registra la siguiente información: codigo, costo, año fabricación, descripción, porc_incrementoAnual
    // incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
    // venta y false en caso contrario). baja.
    private $codigo;
    private $costo;
    private $añoFabricación;
    private $descripción;
    private $porc_incrementoAnual;
    private $activa;
    //2. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    /* 
        @param $codigo STRING
        @param $costo STRING
        @param $añoFabricación BOOLEAN
        @param $descripción STRING
        @param $porc_incrementoAnual INT
        @param $activa BOOLEAN
    */
    public function __construct($codigo,$costo,$añoFabricación,$descripción,$porc_incrementoAnual,$activa){
        $this -> codigo = $codigo;
        $this -> costo = $costo;
        $this -> añoFabricación = $añoFabricación;
        $this -> descripción = $descripción;
        $this -> porc_incrementoAnual = $porc_incrementoAnual;
        $this -> activa = $activa;
    }
    //3. Los métodos de acceso de cada uno de los atributos de la clase.
    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAñoFabricación(){
        return $this->añoFabricación;
    }
    public function getDescripción(){
        return $this->descripción;
    }
    public function getPorc_incrementoAnual(){
        return $this->porc_incrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }
    /*
     4. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
        Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
        la venta, el método realiza el siguiente cálculo:
        $_venta = $_compra + $_compra * (anio * por_inc_anual)
        donde $_compra: es el costo de la moto.
        anio: cantidad de años transcurridos desde que se fabricó la moto.
        por_inc_anual: porc_incrementoAnual de incremento anual de la moto.

    */
    public function darPrecioVenta(){
        $_venta = -1;
        if($this->activa == true){
            $_compra= $this->costo;
            $anio= 2024 - $this->añoFabricación;
            $por_inc_anual= $this->porc_incrementoAnual/100;
            $_venta = $_compra + $_compra * ($anio * $por_inc_anual);
        }
        return $_venta;
    }
    //5. Redefinir el método _toString para que retorne la información de los atributos de la clase
    public function __toString(){
        $activa = $this -> getActiva() == true ? "SI esta activa" : "NO esta activa";
        $info="\n\n\e[1;37;43mLa informacion de la moto es:\e[0m"
        ."\ncodigo: ". $this -> getCodigo()
        ."\ncosto: ". $this -> getCosto()
        ."\nDe Baja: ". $this -> getAñoFabricación()
        ."\ndescripción: ". $this -> getDescripción()
        ."\nIncremento Anual: ". $this -> getPorc_incrementoAnual()
        ."\nActiva: ". $activa;
        return $info;
    }
}
