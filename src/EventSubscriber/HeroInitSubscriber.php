<?php

namespace Drupal\module_hero\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use Symfony\Component\HttpKernel\KernelEvents;

include('../../kint.phar');


class HeroInitSubscriber implements EventSubscriberInterface{
    
    public function __construct(){}

    public function onRequest($event){
        dpm("hello from event");
    }
    
    
    public static function getSubscribedEvents(){
        $events[KernelEvents::REQUEST][] = ['onRequest'];
        return $events;
    }
}