<?php

       // buscar restaurante

      / $restaurante =  restaurante::where('id', 1);
       $restaurante =  restaurante::where('titulo', 'estancia');
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

        print_r($result);


?>