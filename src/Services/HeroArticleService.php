<?php

namespace Drupal\module_hero\Services;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeManager;

class HeroArticleService{
  public function getHeroArticles(){

        $nids = \Drupal::entityQuery('node')->condition('type','article')->execute();
        $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);

        $nid = 1;
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
        
    $articles = ["Hulk is mad", "Flash is fast"];
    
    return $nodes;
  }
}