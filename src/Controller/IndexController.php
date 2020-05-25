<?php

namespace App\Controller;

use App\Controller\Base\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 *
 * @package App\Controller
 * @Route("", name="app_index_")
 */
class IndexController extends BaseController
{
    /**
     * @Route("/", methods={"GET"}, name="panel")
     */
    public function panel(Request $request): Response
    {
        return $this->render('index/panel.html.twig');
    }
}