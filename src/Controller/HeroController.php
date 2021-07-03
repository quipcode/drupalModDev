<?php

namespace Drupal\module_hero\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\Services\HeroArticleService;
use Drupal\user\Entity;

use Drupal\Core\Config\ConfigFactory;


include 'kint.phar';
 



/**
* This is our hero controller
*
* */
class HeroController extends ControllerBase{

    protected $configFactory;
    protected $currentUser;

    /**
     * The hero article service
     * @var \Drupal\module_hero\Services\HeroArticleService
     */
    protected $articleHeroService;

    /**
     * HeroController constructor.
     *
     * @param \Drupal\module_hero\Services\HeroArticleService $articleHeroService
     *   The service
     */
    public function __construct(HeroArticleService $articleHeroService, $configFactory, $currentUser){
        $this->articleHeroService = $articleHeroService;
        $this->configFactory = $configFactory;
        $this->currentUser = $currentUser;
    }

    
    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     *   The Drupal service container.
     *
     * @return static
     */
    public static function create(ContainerInterface $container){
        return new static(
            $container->get('module_hero.hero_articles'),
            $container->get('config.factory'),
            $container->get('current_user')
        );
    }

    public function getCurrUser(){
        $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
        return $user;
    }

  public function heroArticles(){
    //   d($this->articleHeroService->getHeroArticles());
        $articles = $this->articleHeroService->getHeroArticles();
        $currUser = $this->getCurrUser();
        return [
            '#theme' => 'hero_articles',
           '#items' => $articles,
           '#current_user' => $currUser,
           '#title' => $this->t('Articles about our heroes'),
        ];
        
    
  }

    public function heroList(){
        // d($this->articleHeroService->getHeroArticles());
        // Kint::dump('dumped with kint');
        // d('Dumped with Kint');
        
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
        if($this->currentUser->hasPermission('can see hero list')){
                return [
                '#theme' => 'hero_list',
                '#items' => $heroes,
                '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
                ];
        }else {
                    return [
           '#theme' => 'hero_list',
           '#items' => [],
           '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
        ];
        }


    }

}