<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    /**
     * @Route("/hello/{name}/age/{age}", name="hello_name", requirements={"age"="\d+"})
     * @Route("/hello/{name}/{age}", name="hello_name", requirements={"age"="\d+"})
     * @Route("/hello", name="hello_base")
     * Montre la page qui dit bonjour
     */
    public function hello($name = null, $age = null) {
        return $this->render(
            'hello.html.twig', [
                'name' => $name,
                'age' => $age
            ]
            );
    }

    /**
     * @Route("/", name="homepage")
     */
    public function home() {
        $names = ['David' => 32, "Maki" => 34, "Mizuki" => 3, "Kazuma" => 1];

        return $this->render(
            'home.html.twig', [ 
                'title' => "bouloulou",
                'age' => 17,
                'names' => $names
            ]            
        );
    }
}