<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class AppController extends Controller
{
    /**
     * @Route("/app", name="app")
     */
    public function homeAction(Request $request)
    {
        $serializer = $this->get('serializer');
        return $this->render('app/shelters.html.twig', [
            // We pass an array as props
            'props' => $serializer->normalize(
                ['usuari' => $this->get('usuari.manager')->getUsuari(),
                 'baseUrl' => $this->generateUrl('app'),
                 'location' => $request->getRequestUri()
                ])
        ]);
    }

    /**
     * @Route("/shelter/{slug}", name="shelter")
     */
    public function shelterAction($slug, Request $request)
    {
        $serializer = $this->get('serializer');
        if (!$this->get('shelter.manager')->findOneBySlug($slug)) {
            throw $this->createNotFoundException('The shelter does not exist');
        }
        return $this->render('app/shelters.html.twig', [
            // A JSON string also works
            'props' => $serializer->serialize(
                ['shelter' => $this->get('shelter.manager')->findOneBySlug($slug),
                'usuari' => $this->get('usuari.manager')->getUsuari(),
                 'baseUrl' => $this->generateUrl('app'),
                 'location' => $request->getRequestUri()
                ], 'json')
        ]);
    }
}
