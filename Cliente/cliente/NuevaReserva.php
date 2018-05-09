<?php
try {
    $wsdl_url = "http://localhost:8080/HotelServidor/Hotel?WSDL";
    $client = new SOAPClient($wsdl_url);
    $params = array(
    );
    $return = $client->ListarHabitaciones($params);
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
    echo "<link rel='stylesheet' href='calendario/tcal.css'>";
    echo "<script type='text/javascript' src='calendario/tcal.js'> </script>";
    echo "<!-- AdminLTE Skins. Choose a skin from the css/skins";
    echo "folder instead of downloading all of them to reduce the load. -->";
    echo "<link rel='stylesheet' href='../config/css/_all-skins.min.css'>";
    echo "<script>";
	          echo "function validar(e) {";
	                echo "tecla = (document.all) ? e.keyCode : e.which;";
	                echo "if (tecla == 8)";
	                      echo "return true;";
	                echo "patron = /\d/;";
	                echo "te = String.fromCharCode(tecla);";
	                echo "return patron.test(te);";
	          echo "}";
			echo "function validaFecha( f1,f2 ){";
				echo "if(f1<f2)";
				echo "return true;";
				echo "else";
				echo "alert('Fechas incorrectas');";
			echo "}";

    echo "</script>";


    echo "</head>";
    echo "<body class='hold-transition skin-green sidebar-mini'>";
    echo "<h2>Hotel</h2>";
    echo "<h3>Reserva Nueva</h3>"; 
    echo "<form id='login' name='login' method='POST' action='reserva.php'>";
      echo "<div class='form-group'>";
        echo "<label for='idCliente'>Cedula Cliente</label>";
        echo "<input type='text' name='idCliente' class='form-control' onkeypress='return validar(event)' placeholder='Cedula...' required=''>";
      echo "</div>";
      
    echo "<div class='form-group'>";
        echo "<label for='idHabitacion'>Habitacion</label>";
        echo "<select name='idHabitacion' class='form-control'>";
        foreach ($return as $res){
            $con=count($return->return);
            for($i=0;$i<$con;$i++){   
            	if ($return->return[$i]->estado=='Desocupada'){             
	                echo "<option name='idHabitacion' value='";
	                echo $return->return[$i]->id;
	                echo "'>";
	                echo $return->return[$i]->id;
	                echo "  ";
	                echo $return->return[$i]->estado;
	                echo "</option>";
            	}
            }       
        }
        echo "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
        echo "<label for='diaEntrada'>Dia Entrada</label>";
        echo "<input type='text' name='diaEntrada'  class='tcal' class='form-control' required=''>";        
        echo "<label for='diaSalida'>     Dia Salida</label>";        
        echo "<input type='text' name='diaSalida'  class='tcal' class='form-control' required=''>";
        
      echo "</div>";
      echo "<div class='form-group'>";
        echo "<label for='diaReserva'>Dia Reserva</label>";
        $hoy=(string)date('Y-m-d');
        
        echo "<input type='text' name='diaReserva' class='form-control' disabled value='".$hoy."'>";
        print_r($_POST['diaReserva']);
      echo "</div>";
    echo "<div class='form-group'>";
    	$fecha1=$_POST['diaEntrada'];
        $fecha2=$_POST['diaSalida'];
      	echo "<a><button class='btn btn-lg btn-info' type='submit' onclick='validaFecha('$fecha1','$fecha2')'> <span class='fa fa-plus'></span> Agregar</button></a>";
      echo "</div>";
    echo "</form> ";
    echo "<a href='index1.html'><button class='btn btn-lg btn-info'  href='index1.html' name='botonHa' value='Nueva Habitacion'> <span class='fa fa-reply'></span> Volver</button> </a>";
    echo "<!-- jQuery 2.1.4 -->";
    echo "<script src='../config/js/jQuery-2.1.4.min.js'></script>";
    echo "<!-- Bootstrap 3.3.5 -->";
    echo "<script src='../config/js/bootstrap.min.js'></script>";
    echo "<!-- AdminLTE App -->";
    echo "<script src='../config/js/app.min.js'></script>    ";
    echo "</body>";
    echo "</html>";    
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}
?>