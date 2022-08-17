<?php

 
class BdatosService                        
{
    public function crearConexionMysql($config)   
    {
        return mysqli_connect(            
            $config['hostname'],
            $config['usuario'],
            $config['contrasena']
        );
    }

    public function comprobarSiExisteNombre($nombreAComprobar, $config)
    {
        $objetoConexion = $this->crearConexionMysql($config);
        mysqli_select_db($objetoConexion, $config['bdd']);
        $consulta = 'SELECT * FROM ' . $config['tabla'] .
                 " WHERE nombre='" . $nombreAComprobar . "'";
        $result = mysqli_query($objetoConexion, $consulta);
        $datos = mysqli_fetch_all($result);
        mysqli_close($objetoConexion);
        if ($datos != []) {
            return true;
        } else {
            return false;
        }
    }
    
    public function insertar($values, $config)
    {
        if ($this->comprobarSiExisteNombre($values[0], $config)) {
            return false;
        }
        $conexion = $this->crearConexionMysql($config);
        mysqli_select_db($conexion, $config['bdd']);
        $consulta = 'INSERT INTO ' . $config['tabla'] . ' (';
        foreach($config['columnas'] as $columna) {
            $consulta = $consulta . $columna . ", ";
        }
        $consulta = rtrim($consulta, ", ") . ') VALUES (';
        foreach($values as $valor){
            $consulta = $consulta . "'" . $valor . "', " ;
        }
        $consulta = rtrim($consulta, ", ") . ')';
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        return true;
    }

    public function traerTodo($config)
    {
        $objetoConexion = $this->crearConexionMysql($config);
        mysqli_select_db($objetoConexion, $config['bdd']); 
        $consulta = 'SELECT * FROM ' . $config['tabla'];
        $result = mysqli_query($objetoConexion, $consulta);
        $datos = mysqli_fetch_all($result);
        mysqli_close($objetoConexion);
        return $datos;
    }

    public function eliminar($id, $config)
    {   
        $objetoConexion = $this->crearConexionMysql($config);
        mysqli_select_db($objetoConexion, $config['bdd']); 
        $consulta = 'DELETE FROM ' . $config['tabla'] . ' WHERE id=' . $id;
        $result = mysqli_query($objetoConexion, $consulta);
        mysqli_close($objetoConexion);
        return $result;
    }

    public function traerPorId($id, $config)
    {
        $objetoConexion = $this->crearConexionMysql($config);
        mysqli_select_db($objetoConexion, $config['bdd']); 
        $consulta = 'SELECT * FROM ' . $config['tabla'] . ' WHERE id=' . $id;
        $result = mysqli_query($objetoConexion, $consulta);
        $datos = mysqli_fetch_all($result);
        mysqli_close($objetoConexion);
        return $datos;
    }

    public function actualizar($values, $id, $config)
    {
        $conexion = $this->crearConexionMysql($config);
        mysqli_select_db($conexion, $config['bdd']);
        $consulta = 'UPDATE ' . $config['tabla'] . ' SET ';
        foreach($config['columnas'] as $index=>$columna) {
            $consulta = $consulta . $columna . " = '" . $values[$index] . "', ";
        }
        $consulta = trim($consulta, ", ") . " WHERE id = " . $id;
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        return true;
    }
}

?>
