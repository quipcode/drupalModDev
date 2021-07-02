<?php

namespace Drupal\module_hero\Forms;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class AjaxHeroForm extends FormBase{

      /**
     * {@inheritdoc}
     */
    public function getFormId(){
        return "module_hero_ajaxhero";
    }

      /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state){
          $form['message'] = [
            '#type' => 'markup',
            '#markup'=> '<div class="result_message"></div>'
        ];
        
        $form['rival_1']=[
            '#type' => 'textfield',
            '#title' => $this->t('Rival one')
        ];

        $form['rival_2']=[
            '#type' => 'textfield',
            '#title' => $this->t('Rival two')
        ];

      

        $form['submit']=[
            '#type' => 'button',
            '#value' => $this->t('Who will win?'),
            '#ajax'=>[
                'callback' => '::setMessage',
            ]
        ];
        
        return $form;
    }

    /**
     * custom message to show upon form submission
     */
    public function setMessage(array &$form, FormStateInterface $form_state ){
        $winner = rand(1,2);
        $response = new AjaxResponse();
        $response->addCommand(
            new HtmlCommand('.result_message', 'The winner is '. $form_state->getValue('rival_'.$winner))
            
        );
        return $response;
    }

      /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state ){

    }
    
}