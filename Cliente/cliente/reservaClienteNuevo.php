<?php
    try {
        $wsdl_url = 'http://localhost:8080/HotelServidor/Hotel?WSDL';
        $client = new SOAPClient($wsdl_url);
        $nombre=$_POST['Nombre'].' '.$_POST['Apellido'];
        $params = array(
            'idCliente' => $_POST['Cedula'],
            'nombre' => $nombre,
            'celular' => $_POST['Email'],
            'diaEntrada' => $_POST['diaEntrada'],
            'diaSalida' => $_POST['diaSalida'],
            'diaReserva' => date('Y-m-d'),
            'idHabitacion' => $_POST['idHabitacion'],
            'usuario' =>  $_POST['Cedula'],
            'password' => $_POST['Cedula'],
            'privilegio' => "usuario",
        );
        $return = $client->AgregarReservaC($params);
        if ($return->return=="no disponible"){
            echo "<br>";
            echo '<div class="booking-form-head-agile">';
            echo "<h3>El id de cliente ya existe!</h3>";
            echo "</div>   ";
            
        }else{
            if ($return->return=="disponible"){
                echo "<br>";
                echo '<div class="booking-form-head-agile">';
                echo "<h3>Reserva realizada con exito!</h3>";
                echo "<h3>Su usuario y contraseña son la cedula</h3>";
                echo "</div>   ";
               
            }
        }    
    
    } catch (Exception $e) {
        echo "Exception occured: " . $e;
    }
?>