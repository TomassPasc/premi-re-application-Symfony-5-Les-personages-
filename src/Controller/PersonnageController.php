<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('personnage/index.html.twig');
    }


    /**
     * @Route("/persos", name="personnages")
     */
    public function persos()
    {
        $perso1 =  [
            "pseudo" => "Marc",
            "age" => 52,
            "sexe" => true,
            "carac" => [
                "force" => 3,
                "agi" => 2,
                "intel" => 3
                ]
            ];
        
            $perso2 =  [
                "pseudo" => "Milo",
                "age" => 12,
                "sexe" => true,
                "carac" => [
                    "force" => 6,
                    "agi" => 7,
                    "intel" => 1
                    ]
                ];

            $perso3 =  [
                "pseudo" => "Tya",
                "age" => 25,
                "sexe" => false,
                "carac" => [
                    "force" => 3,
                    "agi" => 9,
                    "intel" => 10
                    ]
                ];
            
            $players = [
                "j1" => $perso1,
                "j2" => $perso2,
                "j3" => $perso3
            ];
        return $this->render('personnage/persos.html.twig',[
            "players" => $players
        ]);
    }
}

