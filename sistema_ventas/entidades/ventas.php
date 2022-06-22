<?php

class Venta
{
    private $idventa;
    private $fk_idcliente;
    private $fk_idproducto;
    private $fecha;
    private $cantidad;
    private $preciounitario;
    private $total;
    
    
    

    public function __construct()
    {
        $this-> cantidad=0;
        $this-> total=0;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request)
    {
        $this->idventa = isset($request["id"]) ? $request["id"] : "";
        $this->fk_idcliente = isset($request["lstfk_idcliente"]) ? $request["lstfk_idcliente"] : "";
        $this->fk_idproducto = isset($request["lstfk_idproducto"]) ? $request["lstfk_idproducto"] : "";
        $this->cantidad = isset($request["txtcantidad"]) ? $request["txtcantidad"] : "";
        $this->preciounitario = isset($request["txtpreciounitario"]) ? $request["txtpreciounitario"] : "";
        $this->total = isset($request["total"]) ? $request["total"] : "";
        
        if (isset($request["txtAnio"]) && isset($request["txtMes"]) && isset($request["txtDia"])) {
        $this->fecha = $request["txtAnio"] . "-" . $request["txtMes"] . "-" . $request["txtDia"];
        }
    }

    public function insertar()
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Arma la query
        $sql = "INSERT INTO ventas (
                    fk_idcliente,
                    fk_idproducto,
                    cantidad,
                    preciounitario,
                    total,
                    fecha
                   
                ) VALUES (
                    $this->fk_idcliente,
                    $this->fk_idproducto,
                    '$this->fecha',
                    $this->cantidad,
                    '$this->preciounitario',
                    $this->total
                    
                    
                    
                );";
        // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idventa = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE ventas SET
                fk_idcliente = '" . $this->fk_idcliente . "',
                fk_idproducto = '" . $this->fk_idproducto . "',
                fecha = '" . $this->fecha . "',
                cantidad = " . $this->cantidad . ",
                preciounitario =  '" . $this->preciounitario . "',
                total =  " . $this->total . ",
                
                WHERE idventa = " . $this->idventa;

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM ventas WHERE idventa = " . $this->idventa;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idventa,
                        fk_idcliente,
                        fk_idproducto,
                        cantidad,
                        preciounitario,
                        total,
                        fecha
                FROM ventas
                WHERE idventa = $this->idventa";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idventa = $fila["idventa"];
            $this->fk_idcliente = $fila["fk_idcliente"];
            $this->fk_idproducto = $fila["fk_idproducto"];
            $this->cantidad = $fila["cantidad"];
            $this->preciounitario = $fila["preciounitario"];
            
            $this->total = $fila["total"];
            $this->fecha = $fila["fecha"];
            
        }
        $mysqli->close();

    }

     public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                        idventa,
                        fk_idcliente,
                        fk_idproducto,
                        cantidad,
                        preciounitario,
                        total,
                        fecha
                FROM ventas";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Venta();
                $entidadAux->idventa = $fila["idventa"];
                $entidadAux->fk_idcliente = $fila["fk_idcliente"];
                $entidadAux->fk_idproducto = $fila["fk_idproducto"];
                $entidadAux->cantidad = $fila["cantidad"];
                $entidadAux->preciounitario = $fila["preciounitario"];
                $entidadAux->total = $fila["total"];
                $entidadAux->fecha = $fila["fecha"];
                
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }

}
?>