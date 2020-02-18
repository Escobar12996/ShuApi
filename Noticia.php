<?php

    require_once 'Conexion.php';

class Noticia extends Conexion {

    function getNoticias(){
        $query = $this->connect()->query('SELECT * FROM noticias');
        return $query;
    }

    function addNoticias($noticia){
        $query = $this->connect()->prepare('INSERT INTO noticias (noticia, cuerpo) VALUES (:noticia, :cuerpo)');
        $query->execute(['noticia' => $noticia['noticia'], 'cuerpo' => $noticia['cuerpo']]);
        return $query;
    }

    function removeNoticia($id){
        $query = $this->connect()->prepare('DELETE FROM noticias WHERE (id = :id);');
        $query->execute(['id' => $id]);
        return $query;
    }

}