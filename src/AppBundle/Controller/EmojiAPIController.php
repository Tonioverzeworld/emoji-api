<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EmojiAPIController extends Controller
{
    /**
     * @Route("/emojis", name="emojis_list")
     * @Method({"GET"})
     */
    public function indexAction(Request $request)
    {
        $emojis = $this->getDoctrine()->getRepository('AppBundle:Emoji')->findAll();

        $data = $this->get('jms_serializer')->serialize($emojis, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
