<?php

namespace Drupal\module_hero\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
*provides a block "Example hero block"
*
* @Block(
*       id = "module_hero_hero",
*       admin_label = @Translation("Example hero block")
*   )
 */

class HeroBlock extends BlockBase{

    /**
    * {@inheritdoc}
     */
    public function build(){
        $heroes = [
            ['hero_name' => 'Thor', 'real_name' => 'Thor Odinson'],
            ['hero_name' => 'Captain America', 'real_name' => 'Steve Rogers'],
            ['hero_name' => 'Wolverine', 'real_name' => 'James Howlett'],
            ['hero_name' => 'Phoenix', 'real_name' => 'Jean Grey'],
            ['hero_name' => 'Wonder Woman', 'real_name' => 'Diane Prince'],
            ['hero_name' => 'Batman', 'real_name' => 'Bruce Wayne'],
            ['hero_name' => 'Superman', 'real_name' => 'Clark Kent'],
            ['hero_name' => 'Spider-Man', 'real_name' => 'Peter Parker']
        ];

        $table = [
            '#type' => 'table',
            '#header' => [
                $this->t('Hero Name'),
                $this->t('Real Name'),
            ]

            ]; 

            foreach($heroes as $hero){
                $table[] = [
                        'hero_name' =>[
                            '#type' => 'markup',
                            '#markup' => $hero['hero_name']
                        ],
                        'real_name' => [
                            '#type' => 'markup',
                            '#markup' => $hero['real_name']
                        ]
                    ];
            }
            return $table;

     
    }

}