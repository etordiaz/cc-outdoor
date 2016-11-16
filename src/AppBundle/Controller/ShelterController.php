<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class ShelterController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        $serializer = $this->get('serializer');
        return $this->render('app/shelters.html.twig', [
            // We pass an array as props
            'props' => $serializer->normalize(
                ['shelters' => $this->get('shelter.manager')->findAll()->shelters,
                'usuari' => $this->get('usuari.manager')->getUsuari(),
                // '/' or maybe '/app_dev.php/', so the React Router knows about the root
                 'baseUrl' => $this->generateUrl('homepage'),
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
        if (!$shelter = $this->get('shelter.manager')->findOneBySlug($slug)) {
            throw $this->createNotFoundException('The shelter does not exist');
        }
        return $this->render('app/shelter.html.twig', [
            // A JSON string also works
            'props' => $serializer->serialize(
                ['shelter' => $this->get('shelter.manager')->findOneBySlug($slug),
                 'baseUrl' => $this->generateUrl('homepage'),
                 'location' => $request->getRequestUri()
                ], 'json')
        ]);
    }

    /**
     * Retorna les dades de totes les marquesines
     *
     * @ApiDoc(
     *   description = "Retorna les dades de totes les marquesines",
     *   output = "AppBundle\Model\ShelterCollection",
     *   statusCodes = {
     *      200="Returned when successful",
     *      403="Returned when the user is not authorized",
     *      404={
     *           "Returned when something the user's invoice history is not found"
     *      }
     *   },
     *   requirements={
     *   },
     *   section = "Shelters",
     * )
     *
     * @return array
     *
     * @throws NotFoundHttpException when list not found
     *
     * GET Route annotation.
     * @Get("/api/shelters/{cityId}", defaults={ "_format" = "json" })
     */

    public function apiSheltersAction($cityId, Request $request)
    {
        $serializer = $this->get('serializer');
        return new JsonResponse($this->get('shelter.manager')->findAll()->shelters);
    }


    /**
     * Retorna les dades d'una marquesina
     *
     * @ApiDoc(
     *   description = "Retorna les dades d'una marquesina",
     *   output = "AppBundle\Model\Shelter",
     *   statusCodes = {
     *      200="Returned when successful",
     *      403="Returned when the user is not authorized",
     *      404={
     *           "Returned when something the user's invoice history is not found"
     *      }
     *   },
     *   requirements={
     *   },
     *   section = "Shelters",
     * )
     *
     * @return array
     *
     * @throws NotFoundHttpException when list not found
     *
     * GET Route annotation.
     * @Get("/api/shelter/{slug}", defaults={ "_format" = "json" })
     */
    public function apiShelterAction($slug, Request $request)
    {
        $serializer = $this->get('serializer');
        return new JsonResponse($this->get('shelter.manager')->findOneBySlug($slug));
    }
}
