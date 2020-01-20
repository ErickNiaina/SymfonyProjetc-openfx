<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/pointage", name="pointage")
     */
    public function index(Request $request)
    {
        dump($request->getLocale());
        return $this->render('default/index.html.twig');
    }
}
