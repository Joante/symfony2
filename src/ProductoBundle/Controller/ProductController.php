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
    	return $this->render('ProductoBundle:Default:view.html.twig' , [
    																		'producto'=> $producto
    																		]);
    }
}
