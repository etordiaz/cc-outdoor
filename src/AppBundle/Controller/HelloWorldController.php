<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloWorldController extends Controller
{
    /**
     * @Route("/helloWorld", name="helloWorld")
     */
    public function helloWorldAction(Request $request)
    {
        $serializer = $this->get('serializer');
        return $this->render('helloWorld/helloWorld.html.twig', [
            // We pass an array as props
            'props' => $serializer->normalize(
                ['salutacio' => $this->get('helloWorld.manager')->findAll(),
                // '/' or maybe '/app_dev.php/', so the React Router knows about the root
                 'baseUrl' => $this->generateUrl('helloWorld'),
                 'location' => $request->getRequestUri()
                ])
        ]);
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
