<?php

namespace Drupal\module_hero\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\Services\HeroArticleService;




include 'kint.phar';
 



/**
* This is our hero controller
*
* */
class HeroController extends ControllerBase{

    
    

    private $articleHeroService;

    public static function create(ContainerInterface $container){
        return new static(
            $container->get('module_hero.hero_articles')
        );
    }

    public function __construct(HeroArticleService $articleHeroService){
        $this->articleHeroService = $articleHeroService;
    }

    public function heroList(){
        // Kint::dump('dumped with kint');
        // d('Dumped with Kint');
        // private $service = \Drupal::service('module_hero.hero_articles');
        d($this->articleHeroService->getHeroArticles());
        // d($this->articleHeroService->getHeroArticles);
        // Kint::dump($this->articleHeroService); die();
        // kint($this->articleHeroService); die();
        $heroes = [
            ['name' => 'Thor'],
            ['name' => 'Captain America'],
            ['name' => 'Wolverine'],
            ['name' => 'Phoenix'],
            ['name' => 'Wonder Woman'],
            ['name' => 'Batman'],
            ['name' => 'Superman'],
            ['name' => 'Spider-Man']
        ];
        

        return [
           '#theme' => 'hero_list',
           '#items' => $heroes,
           '#title' => $this->t('Our wonderful heroes list'),
        ];
    }

}