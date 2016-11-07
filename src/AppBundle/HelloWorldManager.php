<?php

namespace AppBundle;
use Symfony\Component\Yaml\Parser;
use AppBundle\Model\HelloWorld;

class HelloWorldManager
{
    private $helloWorldEntity;

    public function __construct()
    {
        // $yaml = new Parser();

        // $recipesArray = $yaml->parse(file_get_contents(__DIR__.'/Resources/Data/recipe.yml'))['recipes'];
        // $recipes = array();
        // foreach($recipesArray as $recipeArray) {
        //     $recipe = new Recipe();
        //     $recipe->name = $recipeArray['name'];
        //     $recipe->slug = $recipeArray['slug'];
        //     $recipe->image = $recipeArray['image'];
        //     $recipes[] = $recipe;
        // }
        $this->helloWorldEntity = new HelloWorld('Benvolgut ');
    }

    public function findAll()
    {
        return $this->helloWorldEntity;
    }
}
