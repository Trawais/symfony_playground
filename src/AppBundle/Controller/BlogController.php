<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BlogController extends Controller
{
    public function listAction($page = 1)
    {
        return new Response(
            'Page number: '.$page
        );
    }

    public function showAction(Request $request, $slug)
    {
        $url = $this->generateUrl(
            'blog_show',
            ['slug' => $slug],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        if ($slug == 'not_found') {
            throw $this->createNotFoundException('Slug was not found');
        }

        $session = $request->getSession();

        return new Response(
            'parameter is: '.$slug.' url is: '.$url
        );
    }

    public function returnJsonAction()
    {
        return $this->json(['user' => ['first_name' => 'jan', 'last_name' => 'travnicek']]);
    }
}
