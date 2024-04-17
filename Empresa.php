<?php
/*
    En la clase Empresa:
*/
include "Venta.php";
class Empresa{
    //Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
    //motos y la colección de ventas realizadas.

    private $denominación;
    private $dirección;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentasRealizadas;
    //2. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    /* 
        @param $denominación STRING
        @param $dirección STRING
        @param $coleccionClientes ARRAY
        @param $coleccionMotos ARRAY
        @param $coleccionVentasRealizadas ARRAY
    */
    public function __construct($denominación,$dirección,$coleccionClientes,$coleccionMotos,$coleccionVentasRealizadas){
        $this -> denominación = $denominación;
        $this -> dirección = $dirección;
        $this -> coleccionClientes = $coleccionClientes;
        $this -> coleccionMotos = $coleccionMotos;
        $this -> coleccionVentasRealizadas = $coleccionVentasRealizadas;
    }
    //3. Los métodos de acceso de cada uno de los atributos de la clase.
    public function getDenominación(){
        return $this->denominación;
    }
    public function getDirección(){
        return $this->dirección;
    }
    public function getColeccionClientes(){
        return $this->coleccionClientes;
    }
    public function getColeccionMotos(){
        return $this->coleccionMotos;
    }
    public function getColeccionVentasRealizadas(){
        return $this->coleccionVentasRealizadas;
    }
    /*
     4. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
        parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
        se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
        Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
        para registrar una venta en un momento determinado.
        El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
        venta.
    */
    //@param $colCodigosMoto ARRAY
    //@param $objCliente OBJ
    public function registrarVenta($colCodigosMoto,$objCliente){
        $numeroVenta = count($this->coleccionVentasRealizadas)+1;
        $venta = new Venta($numeroVenta,16042024,$objCliente,[],0);
        forEach($colCodigosMoto as $codigo){
            $seEncuentra = false;
            $posicion = 0;
            while($seEncuentra == false && $posicion < count($this->coleccionMotos)){
                $objMoto = $this->coleccionMotos[$posicion];
                if($objMoto->getCodigo() == $codigo){
                    $seEncuentra = true;
                    $venta->incorporarMoto($objMoto);
                }
                $posicion++;
            }
        }
        array_push($this->coleccionVentasRealizadas,$venta);
        return "El importe final de la venta es " . $venta->getPrecioFinal();
    }
    /*
     5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
        retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro
    */
    //@param $objMoto INT
    public function retornarMoto($codigoMoto){
        $seEncuentra = false;
        $cant = 0;
        $objMoto = "no se encontro moto";
        while($seEncuentra == false && $cant < count($this->coleccionMotos)){
            $objMoto = $this->coleccionMotos[$cant];
            if($codigoMoto == $objMoto->getCodigo()){
                $seEncuentra == true;
            }
            $cant++;
        }
        return $seEncuentra==true ? $objMoto : "no se encontro moto";
    }
    /*
     6. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
        número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
    */
    //@param $objMoto OBJ
    public function retornarVentasXCliente($tipo,$numDoc){
        $coleccionVentasCliente = array();
        foreach($this->coleccionVentasRealizadas as $venta){
            $cliente = $venta->getReferenciaCliente();
            if($cliente->getTipo()==$tipo && $cliente->getNumDocumento()==$numDoc){
                array_push($coleccionVentasCliente,$venta);
            }
        }
        return $coleccionVentasCliente;
    }
    //7. Redefinir el método _toString para que retorne la información de los atributos de la clase
    public function __toString(){
        $info="\n\n\e[1;37;41mLa informacion de la empresa es:\e[0m"
        ."\nDenominación: ". $this -> getDenominación()
        ."\nDirección: ". $this -> getDirección()
        ."\n\n\e[1;37;41m Coleccion de clientes:  \e[0m";
        foreach ($this -> getColeccionClientes() as $cliente) {
            $info.=$cliente;
        }
        $info.="\n\n\e[1;37;41m Coleccion de Motos: \e[0m";
        foreach ($this -> getColeccionMotos() as $moto) {
            $info.=$moto;
        }
        $info.="\n\n\e[1;37;41m Coleccion de ventas realizadas: \e[0m\n\n";
        foreach ($this -> getColeccionVentasRealizadas() as $venta) {
            $info.=$venta;
        }
        return $info;
    }
}
