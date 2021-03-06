<?php

namespace Drupal\module_hero\Forms;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;



class ExampleForm extends FormBase{
    /**
     * {@inheritdoc}
     */

     public function getFormId(){
         return "module_hero_exampleform";
     }

         /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state){
        $form['text'] = array(
        '#type' => 'textarea',
        '#title' => $this
            ->t('Text'),
        );

        $form['copy'] = array(
        '#type' => 'checkbox',
        '#title' => $this
            ->t('Send me a copy'),
        );

        $form['settings']['active'] = array(
        '#type' => 'radios',
        '#title' => $this
            ->t('Poll status'),
        '#default_value' => 1,
        '#options' => array(
            0 => $this
            ->t('Closed'),
            1 => $this
            ->t('Active'),
        ),
        );

        $form['example_select'] = [
        '#type' => 'select',
        '#title' => $this
            ->t('Select element'),
        '#options' => [
            '1' => $this
            ->t('One'),
            '2' => [
            '2.1' => $this
                ->t('Two point one'),
            '2.2' => $this
                ->t('Two point two'),
            ],
            '3' => $this
            ->t('Three'),
        ],
        ];
        
        $form['expiration'] = [
        '#type' => 'date',
        '#title' => $this
            ->t('Content expiration'),
        '#default_value' => '2020-02-05',
        ];

        return $form;
    }

        /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state ){
        \Drupal::messenger()->addMessage($this->t("submitting our form"));
    }
     
}