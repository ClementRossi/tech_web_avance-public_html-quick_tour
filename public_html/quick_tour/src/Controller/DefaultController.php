<?php

// src/Controller/DefaultController.php
namespace App\Controller; // on est dans cet espace de nom
use Symfony\Component\HttpFoundation\Response; // on utilise
use Symfony\Component\Routing\Annotation\Route;

class DefaultController{
    public function index($nom=null, $qst=null) {
        if (!$nom){
            return new Response('Bonjour le monde !');
        } else if($nom and $qst){
            return new Response("Bonjour $nom ! $qst");
        }
    }
    /**
     * @route("/")
     * @route("/bonjour)/{nom<a-z+>?toi}/id<\d+>?13}")
     */
    public function bonjour($nom=null, $id=null){
        if(!$nom){
            return new Response ('Bonjour le monde');
        } else {
            return new Response ("Bonjour $nom d'id $id " );
        }
    }

}

?>