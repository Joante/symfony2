<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use ProductoBundle\Entity\Category;


class CategoryApiController extends Controller
{
	/**
     * Lists all category entities.
     *
     * @Route("/category/api", name="category_api_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('ProductoBundle:Category')->findAll();

        $response= new Response();
        $response->headers->add(['Content-Type'=>'application/json']);
        $response->setContent(json_encode($categories));
        return $response;
    }
	 /**
     * Creates a new category entity.
     *
     * @Route("/category/api/new", name="category_api_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm('ProductoBundle\Form\CategoryApiType', $category);
        $form->handleRequest($request);
        $response= new Response();
        $response->headers->add(['Content-Type'=>'application/json']);
        $errors=array();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $response->setContent(json_encode($category));
        }else
        {
            $errors = $this->get('validator')->validate( $category );
            $errors = [
                'name' => 'El nombre no puede ser vacio'
            ];
        	$response->setStatusCode(400);
        	$response->setContent(json_encode($errors));
        		

        }

        return $response;
    }
}
