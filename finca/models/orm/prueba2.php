<?php
require_once('ORM.php');
    require_once('config.php');
    require_once('usuario.php');
    require_once('rol.php');
    require_once('restaurante.php');
    require_once('mesa.php');
    require_once('reserva.php');
    //require_once('');
    

    Database::getConnection(DB_PROVIDER, DB_HOST, DB_USER, DB_PASSWORD, DB_DB);

//disponible($fumador, $capacidad, $restaurante)
    $fumador = 0;
    $capacidad = 5;
    $restaurante = "campero";
    $mesa = reserva::disponible($fumador, $capacidad, $restaurante);
    print_r($mesa);
    echo '<br/>';
    echo 'mesa';
    echo '<br/>';
    $existe = count($mesa);
    echo '<br/>';
    if($existe > 0){
        echo $mesa[0]['mesa'];
    }
    else{
        echo "no hay mesa disponible";
    }
    

       // buscar restaurante

      // $restaurante =  restaurante::where('id', 1);
   /* $restaurante =  restaurante::where('titulo', 'estancia');
    //$usuario = usuario::all();

    print_r($restaurante);


        if ($restaurante) {
            $poblaciones = null;
            foreach ($restaurante as $index => $restaurante) {
                $poblaciones[] = array(
                    'id' => $restaurante->id,
                    'titulo' => $restaurante->titulo,
                    'direccion' =>$restaurante->direccion
                );
            }
            $result = $poblaciones;
        }
        else {
            $result = array('error' => true, 'mensaje' => 'No hay poblaciones para esa provincia');
        }

        echo "va el id del restaurante ".$result[0]['id'];
        echo '<br/>';
        echo '<br/>';

        print_r($result);*/


?>