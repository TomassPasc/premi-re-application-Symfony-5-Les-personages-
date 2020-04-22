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
}

