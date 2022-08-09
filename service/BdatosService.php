<?php

require_once "../config.php";              
//PEDIMOS TRAER ARCHIVO      
 
class BdatosService                        
//VAS A PONER REGLAS PARA CREAR OBJETOS
{
    public $config;                        
//ATRIBUTO PUBLICO DE LA CLASE/OBJETO

    public function __construct($config)   
//METODO QUE SE EJECUTARA AL CREAR EL OBJETO
    {
        $this->config = $config;           
//AL CREAR EL OBJETO GUARDA LA INFO EN EL ATRIBUTO DE LA CLASE
    }

    public function crearConexionMysql()   
//METODO DE CLASE QUE SE EJECUTA PARA CREAR UN OBJETO DE CONEXION A MYSQL
    {
        return mysqli_connect(            
//DEVUELVE CONEXION CON MYSQL
            $this->config['hostname'],     
            $this->config['usuario'],      
            $this->config['contrasena']  
//CONFIGURACION QUE LE DOY A LA FUNCION PARA CREAR LA CONEXION
        );
    }

    public function comprobarSiExisteNombre($nombreAComprobar)
//METODO PARA COMPROBAR SI UN NOMBRE YA EXISTE EN LA TABLA
    {
        $objetoConexion = $this->crearConexionMysql();
//VARIABLE EQUIVALENTE A LO QUE DEVUELVE EL METODO DE ESTA CLASE
        mysqli_select_db($objetoConexion, $this->config['bdd']);
//SELECCIONO BASE DE DATOS DE MYSQL CON SUS PARAMETROS
        $consulta = 'SELECT * FROM ' . $this->config['tabla'] .
                 " WHERE nombre='" . $nombreAComprobar . "'";
//GUARDO  EN UNA VARIABLE EL TEXTO PARA LA CONSULTA DE LA TABLA
        $result = mysqli_query($objetoConexion, $consulta);
//GUARDO EN UNA VARIABLE LA RESPUESTA A UNA CONSULTA A MYSQL
        $datos = mysqli_fetch_all($result);
//GUARDO EN UNA VARIABLE EL ARREGLO DEL OBJETO RESPUESTA
        mysqli_close($objetoConexion);
//CIERRO CONEXION CON MYSQL
        if ($datos != []) {
            return true;
        } else {
            return false;
//SI DATOS ES DISTINTO A UN ARREGLO VACIO DEVUELVE TRUE, SINO DEVUELVE FALSE
        }
    }
    
    public function insertar($values)
//METODO PARA INSERTAR VALORES EN UNA TABLA DE LA BASE DE DATOS
    {
        if ($this->comprobarSiExisteNombre($values[0])) {
            return false;
//SI COMPROBAR SI EXISTE NOMBRE ES VERDADERO ME DEVUELVE FALSE
        }
        $conexion = $this->crearConexionMysql();
        mysqli_select_db($conexion, $this->config['bdd']);
        $consulta = 'INSERT INTO ' . $this->config['tabla'] . ' (';
//GUARDO COMO TEXTO EN VARIABLE LA CONSULTA PARA INSERTAR DATOS
        foreach($this->config['columnas'] as $columna) {
            $consulta = $consulta . $columna . ", ";
//AGREGO POR CADA COLUMNA EL NOMBRE Y COMA A LA VARIABLE CONSULTA
        }
        $consulta = rtrim($consulta, ", ") . ') VALUES (';
//RTRIM ELIMINA LA ULTIMA COMA Y ESPACIO DEL TEXTO DE CONSULTA
        foreach($values as $valor){
            $consulta = $consulta . "'" . $valor . "', " ;
//AGREGO POR CADA VALOR COMILLAS SIMPLES Y COMA A LA VARIABLE CONSULTA
        }
        $consulta = rtrim($consulta, ", ") . ')';
//$CONSULTA EN ESTE PUNTO QUEDA 
// "INSERT INTO argentino (nombre, copas, nacionales) VALUES ('valor-nombre', 'valor_copas', valor-nacionales)"
        mysqli_query($conexion, $consulta);
//ENVIO LA CONSULTA A MYSQL
        mysqli_close($conexion);
        return true;
//SI LA CONSULTA ES CORRECTA DEVUELVE TRUE
    }

    public function traerTodo()
    {
        $objetoConexion = $this->crearConexionMysql();
        mysqli_select_db($objetoConexion, $this->config['bdd']); 
        $consulta = 'SELECT * FROM ' . $this->config['tabla'];
        $result = mysqli_query($objetoConexion, $consulta);
        $datos = mysqli_fetch_all($result);
        mysqli_close($objetoConexion);
        return $datos;
    }

    public function eliminar($id)
    {   
        $objetoConexion = $this->crearConexionMysql();
        mysqli_select_db($objetoConexion, $this->config['bdd']); 
        $consulta = 'DELETE FROM ' . $this->config['tabla'] . ' WHERE id=' . $id;
        $result = mysqli_query($objetoConexion, $consulta);
        mysqli_close($objetoConexion);
        return $result;
    }

    public function traerPorId($id)
    {
        $objetoConexion = $this->crearConexionMysql();
        mysqli_select_db($objetoConexion, $this->config['bdd']); 
        $consulta = 'SELECT * FROM ' . $this->config['tabla'] . ' WHERE id=' . $id;
        $result = mysqli_query($objetoConexion, $consulta);
        $datos = mysqli_fetch_all($result);
        mysqli_close($objetoConexion);
        return $datos;
    }

    public function actualizar($values, $id)
    {
        $conexion = $this->crearConexionMysql();
        mysqli_select_db($conexion, $this->config['bdd']);
        $consulta = 'UPDATE ' . $this->config['tabla'] . ' SET ';
        foreach($this->config['columnas'] as $index=>$columna) {
            $consulta = $consulta . $columna . " = '" . $values[$index] . "', ";
        }
        $consulta = trim($consulta, ", ") . " WHERE id = " . $id;
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        return true;
    }
}
    
$bdService = new BdatosService($configuracion);

?>
