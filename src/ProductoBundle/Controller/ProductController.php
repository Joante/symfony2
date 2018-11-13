<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ProductController extends Controller
{
	/**
     * @Route("/products/view/{id}", name="productDetail")
     */
    public function viewAction($id)
    {

       $producto = $this->getDoctrine()
		    	->getRepository('ProductoBundle:Producto')
		    	->find($id);
        $this->get('app.cart.adapter');
        return $this->render('ProductoBundle:Default:view.html.twig' , [
    																		'producto'=> $producto
    																		]);
    }
    /**
     *@Route("/products/cart/add/{id}/quantity/{quantity}" , name="product_add_cart")
     */
    public function addToCartAction($id, $quantity)
    {
        $producto = $this->getDoctrine()
                ->getRepository('ProductoBundle:Producto')
                ->find($id);
        if(null===$producto)
        {
            throw new \Exception("Product not found");
            
        }
        $this -> get('app.cart')->add($producto);
      
    }
    /**
     *@Route("/products/cart/view" , name="product_view_cart")
     */
    public function viewCartAction()
    {
        var_dump($this->get('app.cart'));
    }
}
