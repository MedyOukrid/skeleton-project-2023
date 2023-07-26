<?php


namespace App\Controller\Front;

use App\Entity\Listing;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ListingRepository;
use App\Controller\Front\Request;

/**
 * Class HomeController.php
 *
 * @author Kevin Tourret
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(ListingRepository $listingRepository): Response {
        

        return $this->render('front/pages/home.html.twig', [
            'listings'=>$listingRepository->findBy([], ['createdAt' => 'ASC'], 9),
            
        ]);
    }
    #[Route('/{id}', name: 'show')]

    public function show(ListingRepository $listingRepository, $id):Response{
        return $this->render('front/pages/showlistening.html.twig', [
            'onelisting' =>     $listingRepository->findOneFullBy($id), 

        ]);

    }
     
}