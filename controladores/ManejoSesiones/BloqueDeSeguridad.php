<?php

class BloqueDeSeguridad {

    public function seguridad($ubicacion) {

            session_start();



        if (empty($_SESSION["autenticado"])) {
 
            header("Location: " . $ubicacion);

            exit(1);
        }
    }

}