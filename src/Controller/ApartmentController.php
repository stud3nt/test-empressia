<?php

namespace App\Controller;

use App\Controller\Base\BaseController;
use App\Manager\ApartmentManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 *
 * @package App\Controller
 * @Route("/", name="app_apartment_")
 */
class ApartmentController extends BaseController
{
    /**
     * @Route("/", methods={"GET"}, name="index")
     */
    public function index(Request $request, ApartmentManager $apartmentManager): Response
    {
        return $this->render('apartment/list.html.twig', [
            'apartments' => $apartmentManager->getApartmentsList()
        ]);
    }
}