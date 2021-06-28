<?php

namespace Drupal\module_hero\Controller;
use Drupal\Core\Controller\ControllerBase;

/**
* This is our hero controller
*
* */
class HeroController extends ControllerBase{

    public function heroList(){

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