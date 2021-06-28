<?php

namespace Drupal\module_hero\Services;

class HeroArticleService{
  public function getHeroArticles(){
    $articles = ["Hulk is mad", "Flash is fast"];
    return $articles;
  }
}