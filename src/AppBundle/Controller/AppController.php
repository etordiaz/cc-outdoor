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
     * Inicialització de l'aplicació amb renderització del twig corresponent.
     * @Route("/app", name="app")
     */
    public function appAction(Request $request)
    {
        $serializer = $this->get('serializer');
        
        $usuari = $this->get('usuari.manager')->getUsuari();

        return $this->render('app/app.html.twig', [
            // We pass an array as props
            'props' => $serializer->normalize(
                ['usuari' => $usuari,
                'baseUrl' => $this->generateUrl('app'),
                'location' => $request->getRequestUri(),
                ]
            )
        ]);
    }

    /**
     * Retorna les dades d'un usuari
     *
     * @ApiDoc(
     *   description = "Retorna les dades dels presents usuaris",
     *   output = "AppBundle\Model\Usuari",
     *   statusCodes = {
     *      200="Returned when successful",
     *      403="Returned when the user is not authorized",
     *      404={
     *           "Returned when something the user's invoice history is not found"
     *      }
     *   },
     *   requirements={
     *   },
     *   section = "Usuari",
     * )
     *
     * @return array
     *
     * @throws NotFoundHttpException when list not found
     *
     * GET Route annotation.
     * @Get("/usuari", defaults={ "_format" = "json" })
     */

    public function usuariAction(Request $request)
    {
        $serializer = $this->get('serializer');
        return new JsonResponse($this->get('usuari.manager')->getUsuari());
    }

    // /**
    //  * @Route("/helloWorld/{slug}", name="helloworld")
    //  */
    // public function helloWorldAction($slug, Request $request)
    // {
    //     $serializer = $this->get('serializer');
    //     if (!$recipe = $this->get('recipe.manager')->findOneBySlug($slug)) {
    //         throw $this->createNotFoundException('The recipe does not exist');
    //     }
    //     return $this->render('recipe/recipe.html.twig', [
    //         // A JSON string also works
    //         'props' => $serializer->serialize(
    //             ['recipe' => $this->get('recipe.manager')->findOneBySlug($slug),
    //              'baseUrl' => $this->generateUrl('homepage'),
    //              'location' => $request->getRequestUri()
    //             ], 'json')
    //     ]);
    // }

    // /**
    //  * @Route("/api/recipes", name="api_recipes")
    //  *
    //  * Needed for client-side navigation after initial page load
    //  */
    // public function apiRecipesAction(Request $request)
    // {
    //     $serializer = $this->get('serializer');
    //     return new JsonResponse($this->get('recipe.manager')->findAll()->recipes);
    // }

    // /**
    //  * @Route("/api/recipes/{slug}", name="api_recipe")
    //  *
    //  * Needed for client-side navigation after initial page load
    //  */
    // public function apiRecipeAction($slug, Request $request)
    // {
    //     $serializer = $this->get('serializer');
    //     return new JsonResponse($this->get('recipe.manager')->findOneBySlug($slug));
    // }
}
