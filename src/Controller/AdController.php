<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Form\AdType;
use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index(AdRepository $repo)
    {
        $ads = $repo->findAll();

        return $this->render('ad/index.html.twig', [
            'ads' => $ads
        ]);
    }
    
    /**
     * Allow user to create an Ad
     * 
     * @Route("/ads/new", name="ads_create")
     * 
     * @return Response
     */
    public function create() {
        $ad = new Ad();

        /**$form = $this->createFormBuilder($ad)
                    ->add('title')
                    ->add('introduction')
                    ->add('content')
                    ->add('rooms')
                    ->add('price')
                    ->add('coverImage')
                    ->add('save', SubmitType::class, [
                        "label" => "Créer la nouvelle annonce",
                        "attr" => [
                            "class" => "btn btn-primary"
                        ]
                    ])
                    ->getForm();
        */

        $form = $this->createForm(AdType::class, $ad);
        
        return $this->render("ad/new.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * Display a single Ad
     * 
     * @Route("/ads/{slug}", name="ads_show")
     * 
     * @return Response
     */
    public function show(Ad $ad) {
        // Gets the Ad based on the slug
        return $this->render('ad/show.html.twig', [
            'ad' => $ad
        ]);
    }

}
