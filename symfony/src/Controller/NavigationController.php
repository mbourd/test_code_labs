<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('navigation/index.html.twig', [
            'controller_name' => 'NavigationController',
        ]);
    }

    public function admin()
    {
        return $this->redirectToRoute("app_agency_index");
    }
}
