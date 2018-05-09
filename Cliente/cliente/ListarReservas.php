<?php

try {
    $wsdl_url = 'http://localhost:8080/HotelServidor/Hotel?WSDL';
    $client = new SOAPClient($wsdl_url);
    $params = array(
    );
    $return = $client->ListarReservas($params);
   echo "<!DOCTYPE html>";
    echo"    <html>";
    echo"<head>";
    echo"<meta charset='utf-8'>";
    echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
    echo "<title>Hotel</title>";
    echo "<!-- Tell the browser to be responsive to screen width -->";
    echo "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>";
    echo "<!-- Bootstrap 3.3.5 -->";
    echo "<link rel='stylesheet' href='../config/css/bootstrap.min.css'>";
    echo "<!-- Font Awesome -->";
    echo "<link rel='stylesheet' href='../config/css/font-awesome.css'>";
    echo "<!-- Theme style -->";
    echo "<link rel='stylesheet' href='../config/css/AdminLTE.min.css'>";
    echo "<!-- AdminLTE Skins. Choose a skin from the css/skins";
    echo "folder instead of downloading all of them to reduce the load. -->";
    echo "<link rel='stylesheet' href='../config/css/_all-skins.min.css'>";
    echo "</head>";
    echo "<body class='hold-transition skin-green sidebar-mini'>";
    echo "<h2>Hotel</h2>";
    echo "<h3>Listado de Habitacion</h3>";
     
    echo "<table class='table table-striped table-bordered table-condensed table-hover'>";
        echo "<thead>";
            echo "<th>Nombre Cliente</th>";
            echo "<th>Dia Entrada</th>";
            echo "<th>Dia Salida</th>";
            echo "<th>Dia Reserva</th>";
            echo "<th>Id Habitacion</th>";
        echo "</thead>";
        foreach ($return as $res){
            $con=count($return->return);
            for($i=0;$i<$con;$i++){
                echo "<tr>";
                    echo "<td>";
                    echo $return->return[$i]->nombreCliente;
                    echo "</td>";
                    echo "<td>";
                    echo $return->return[$i]->diaEntrada;
                    echo "</td>";     
                    echo "<td>";
                    echo $return->return[$i]->diaSalida;
                    echo "</td>";
                    echo "<td>";
                    echo $return->return[$i]->diaReserva;
                    echo "</td>";          
                    echo "<td>";
                    echo $return->return[$i]->idHabitacion;
                    echo "</td>";        
                echo "</tr>";
            }       
        }                
    echo "</table>";
    echo "<div class='form-group'>";
    echo "<a href='index1.html'><button class='btn btn-lg btn-info' type='button' href='index1.html' name='botonHa' value='Nueva Habitacion'> <span class='fa fa-reply'></span> Volver</button> </a>";
    
    echo "</div>   ";  
    echo "<!-- jQuery 2.1.4 -->";
    echo "<script src='../config/js/jQuery-2.1.4.min.js'></script>";
    echo "<!-- Bootstrap 3.3.5 -->";
    echo "<script src='../config/js/bootstrap.min.js'></script>";
    echo "<!-- AdminLTE App -->";
    echo "<script src='../config/js/app.min.js'></script>    ";
    echo "</body>";
    echo "</html>";    
} catch (Exception $e) {
    echo 'Exception occured: ' . $e;
}
?>
