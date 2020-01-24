<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/example.com", name="racine")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function index(Request $request)
    {
        dump($request->getLocale());
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/", name="pageIndex")
     */
    public function indexPage(Request $request)
    {
        return $this->render('default/index.html.twig');
    }
}
