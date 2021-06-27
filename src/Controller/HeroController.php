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
        
        $ourHeroes = '';

        foreach ($heroes as $hero){
            $ourHeroes .= '<li>'. $hero['name']. '</li>';
        }

        return [
            '#type' => 'markup',
            '#markup' => '<h4>'. $this->t('These are the best voted heroes'). '</h4><ol>'. $ourHeroes . '</ol>',
        ];
    }

}