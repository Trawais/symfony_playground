<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function createAction()
    {
        $product = new Product();
        $product->setName('testovaci jmeno');
        $product->setPrice(1528.35);
        $product->setDescription('jen takova testovaci description');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product with id: '.$product->getId());
    }

    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id);

        if ($product) {
            return $this->render('product/product.html.twig',
                ['product' => $product]
            );
        }
        else {
            throw $this->createNotFoundException(
                'No product found for id: '.$id
            );
        }
    }
}
