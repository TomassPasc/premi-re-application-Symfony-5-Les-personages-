<?php

namespace App\Entity;


class Arme{

    public $name;
    public $description;
    public $degat;

    public static $armes = [];

    public function __construct($name, $description, $degat){
        $this->name = $name;
        $this->description = $description;
        $this->degat = $degat;
        self::$armes[] = $this;

    }

    public function creerArme(){
        $arme1 = new Arme("epee", "Une superbe épée tranchante", 10);
        $arme2 = new Arme("hache", "une arme ou un outil", 15);
        $arme3 = new Arme("arc", "une arme à distance", 7);
    }



}