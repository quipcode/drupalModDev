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
        return [
            '#type' => 'markup',
            '#markup' => $this->t('the output of our superheroes block')
        ]; 
    }

}