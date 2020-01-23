<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pointage")
 */
class PointageController extends AbstractController
{
    /**
     * @Route("/index", name="pointage_index", methods={"GET"})
     */
    public function index()
    {
        return $this->render('pointage/pointage.html.twig');
    }

    /**
     * @Route("/list", name="pointage_list", methods={"GET"})
     */
    public function showAll()
    {
        return $this->render('pointage/pointage_list.html.twig');
    }
    /**
     * @Route("/view", name="pointage_view", methods={"GET"})
     */
    public function show()
    {
        return $this->render('pointage/pointage_view.html.twig');
    }
    /**
     * @Route("/nouveau", name="pointage_new", methods={"GET"})
     */
    public function new()
    {
        return $this->render('pointage/pointage_add.html.twig');
    }
    /**
     * @Route("/modifier", name="pointage_edit", methods={"GET"})
     */
    public function edit()
    {
        return $this->render('pointage/pointage_edit.html.twig');
    }
    /**
     * @Route("/feuilleTemps", name="pointage_feuilleTemps", methods={"GET"})
     */
    public function feuilleTemps()
    {
        return $this->render('pointage/pointage_feuilleTemps.html.twig');
    }
    /**
     * @Route("/configuration", name="pointage_configuration", methods={"GET"})
     */
    public function configuration()
    {
        return $this->render('pointage/pointage_configuration.html.twig');
    }
}
