<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use ProductoBundle\Entity\Producto;

class ProductApiController extends Controller
{
    /**
     * @Route("/product/api/product/list" , name="product_api_product_list")
     */
    public function listAction()
    {
    	$productos = $this->getDoctrine()
		    	 ->getRepository('ProductoBundle:Producto')
		    	 ->findAll();
		$response= new Response();
        $response->headers->add(['Content-Type'=>'application/json']);
        $response->setContent(json_encode($productos));
        return $response;
    }
    /**
     * Creates a new producto entity.
     *
     * @Route("/product/api/new", name="products_api_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm('ProductoBundle\Form\ProductoApiType', $producto);
        $form->handleRequest($request);
        $response= new Response();
        $response->headers->add(['Content-Type'=>'application/json']);
        $errors=$form->getErrors();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();
            $response->setContent(json_encode($producto));
            return $response;
        }


        $errorsIterator = $form->getErrors();
        
        if(count($errorsIterator)){
            $config = $form->getConfig();
            $name   = $form->getName();
            $label  = $config->getOption('label');
        }

        //$formErrorsParser = $this->get('formErrorsParser');
        //$errors = $formErrorsParser->parseErrors($form);
        $response->setStatusCode(400);
        $response->setContent(json_encode($errors));
        
        return $response;
    }
}
