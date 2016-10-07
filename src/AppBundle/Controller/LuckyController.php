<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    public function randomizeAction($max)
    {
        $number = mt_rand(0, $max);

        if ($number % 2 == 0) {
            $this->addFlash('notice', 'Random number is even');
        }

        //return $this->redirectToRoute('blog_show', ['slug' => 'ahoj']);
        return $this->render(
            'lucky/number.html.twig',
            ['number' => $number]
        );
    }
}