<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="app_demo")
     */
    public function index(): Response
    {
        return $this->render('demo/index.html.twig',[
            'controller_name'=>'DemoController'
        ]);
        /*return $this->render('demo/test.html.twig',[
            'title'=>'les amies',
            'age'=>13,
            'controller_name'=>'DemoConrommer'
        ]);*/
}
}
