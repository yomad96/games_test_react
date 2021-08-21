<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Repository\ObjetsRepository;
use App\Repository\SocieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateursRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(UtilisateursRepository $utilisateurRepo, SocieteRepository $societeRepo, ObjetsRepository $objetsRepo): Response
    {
        
        
        $utilisateurs = $utilisateurRepo->find(1);
        $societes = $societeRepo->find(1);
        $objets = $societes->getObjets();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'utilisateurs' => $utilisateurs,
            'societes' => $societes,
            'objets' => $objets
        ]);
    }
}
