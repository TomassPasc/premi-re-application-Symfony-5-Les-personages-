<?php

namespace App\Controller;

use App\Entity\Arme;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArmeController extends AbstractController
{
    /**
     * @Route("/armes", name="armes")
     */
    public function lesArmes()
    {
        Arme::creerArme();
        return $this->render('arme/armes.html.twig', [
            "artilleries" => Arme::$armes
        ]);
    }

    /**
     * * @Route("/armes/{nom}", name="afficher_arme")
     */
    public function afficherArme($nom)
    {   
        Arme::creerArme();
        $artillerie = Arme::getArmeParNom($nom);
        return $this->render('arme/arme.html.twig', [
            "artillerie" => $artillerie
        ]);

        
    }
}


