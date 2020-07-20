<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChefController extends AbstractController
{
    /**
     * @Route("/chef", name="chef")
     */
    public function index()
    {
        return $this->render('chef/index.html.twig', [
            'controller_name' => 'ChefController',
        ]);
    }
        /**
     * @Route("/home", name="accueil")
     */
    public function home()
    {
        return $this->render('chef/home.html.twig', [
        ]);
    }
}
