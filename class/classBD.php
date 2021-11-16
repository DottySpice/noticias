<?php
    class BaseDatos
    {
        var $conexion;
        var $numeRegistros;
        var $mensError;

        function conexion()
        {
            $this->conexion=mysqli_connect("localhost", "noticiass", '1234','noticiass');
        }

        function cierreBD(){
            mysqli_close($this->conexion);
        }

        function consulta($query) {
            $this-> conexion();
            $bloque = mysqli_query($this->conexion, $query);

            if(strpos(strtoupper($query),"SELECT") !== false )
                $this->numeRegistros = mysqli_num_rows($bloque);
            $this -> mensError = mysqli_error($this->conexion);
            $this -> cierreBD();
            return $bloque;
        }

        function obtenArreglo($query){
            $bloque = $this -> consulta($query);
            $datos = array();
            foreach ($bloque as $renglon) 
                array_push($datos, $renglon);
            return $datos;
        }

        function obtenRegistro($query){
            $registros = $this -> consulta($query);
            return mysqli_fetch_object($registros);
        }
    }
    $oBD = new BaseDatos();
?>
