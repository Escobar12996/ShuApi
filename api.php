<?php

include_once 'Noticia.php';


class Api {

    function getAll() {
        $f = new Noticia();
        $noticias = array();
        $noticias['items'] = array();

        $res = $f->getNoticias();

        // Validación de la respuesta.
        if($res->rowCount()) { // Si la consulta contiene datos.
            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    'id' => $row['id'],
                    'noticia' => $row['noticia'],
                    'cuerpo' => $row['cuerpo']
                );
                array_push($noticias['items'], $item);
            }
            echo json_encode($noticias);
        } else { // La consulta viene vacia.
            echo json_encode('error');
        }

    }

    function add($item) {
        $f = new Noticia();
        $res = $f->addNoticias($item);
    }

    function removeNoticia($item) {
        $f = new Noticia();
        $res = $f->removenoticia($item);
    }

}