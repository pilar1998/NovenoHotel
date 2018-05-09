<?php
try {
    $wsdl_url = 'http://localhost:8080/HotelServidor/Hotel?WSDL';
    $client = new SOAPClient($wsdl_url);
    $params = array(
        'diaEntrada' => $_POST['diaEntrada'],
        'diaSalida' => $_POST['diaSalida'],
        'idCliente' => $_POST['idCliente'],
        'diaReserva' => (string)date('Y-m-d'),
        'idHabitacion' => $_POST['idHabitacion'],
    );
    $return = $client->AgregarReserva($params);
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
    echo "<h2>Reservacion</h2>";
    if ($return->return=="No existe id de cliente"){
        echo "<h3>No existe id de cliente!</h3>";
        echo "<div class='form-group'>";
        echo "<a href='NuevaReserva.php'><button class='btn btn-lg btn-info' type='button' href='NuevaReserva.php' name='botonHa' value='Nueva Habitacion'> <span class='fa fa-reply'></span> Volver</button> </a>";
        echo "</div>   ";
        echo "<div class='form-group'>";
        echo "<a href='ListarReservas.php'><button class='btn btn-lg btn-info' type='button' href='ListarReservas.php' name='botonHa' value='Nueva Habitacion'> <span class='fa fa-eye'></span> Ver reservas</button> </a>";
       echo "</div>   ";
   
    }else{
        echo "<h3>Reserva realizada con exito!</h3>";
        echo "<div class='form-group'>";
        echo "<a href='index1.html'><button class='btn btn-lg btn-info' type='button' href='index1.html' name='botonHa' value='Nueva Habitacion'> <span class='fa fa-reply'></span> Volver</button> </a>";
        echo "<div class='form-group'>";
        echo "<a href='index1.html'><button class='btn btn-lg btn-info' type='button' href='index1.html' name='botonHa' value='Nueva Habitacion'> <span class='fa fa-reply'></span> Volver</button> </a>";
        echo "<a href='ListarReservas.php'><button class='btn btn-lg btn-info' type='button' href='ListarReservas.php' name='botonHa' value='Nueva Habitacion'> <span class='fa fa-eye'></span> Ver reservas</button> </a>";
        echo "</div>   ";
   
   
    }
    
    
    echo "<!-- jQuery 2.1.4 -->";
    echo "<script src='../config/js/jQuery-2.1.4.min.js'></script>";
    echo "<!-- Bootstrap 3.3.5 -->";
    echo "<script src='../config/js/bootstrap.min.js'></script>";
    echo "<!-- AdminLTE App -->";
    echo "<script src='../config/js/app.min.js'></script>    ";
    echo "</body>";
    echo "</html>";
    } catch (Exception $e) {
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}
?>