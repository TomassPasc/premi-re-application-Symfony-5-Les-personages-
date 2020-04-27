<?php

namespace App\Entity;


class Arme{

    private $name;
    private $description;
    private $degat;

    public static $armes = [];

    public function __construct($name, $description, $degat){
        $this->name = $name;
        $this->description = $description;
        $this->degat = $degat;
        self::$armes[] = $this;

    }

    public function getName(){return $this->name;}
    public function getDescription(){return $this->description;}
    public function getDegat(){return $this->degat;}

    public function setName($name){
        $this->name = $name;
        return $this; //sert pour le chainage
    }
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }
    public function setDegat($degat){
        $this->degat = $degat;
        return $this;
    }

    public function creerArme(){
        new Arme("épée", "Une superbe épée tranchante", 10);
        new Arme("hache", "une arme ou un outil", 15);
        new Arme("arc", "une arme à distance", 7);
    }

    public function getArmeParNom($name){
        foreach (self::$armes as $arme) {
            if (strtolower(str_replace("é","e",$arme->name)) === $name){
                return $arme;
            }
        }
    }



}