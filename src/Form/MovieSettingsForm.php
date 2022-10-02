<?php
/**
* @file* Contains \Drupal\movie\Form\MovieSettingsForm.
*/
namespace Drupal\movie\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
/**
* Class MovieSettingsForm.
*
* @package Drupal\movie\Form
*
* @ingroup movie
*/
class MovieSettingsForm extends FormBase {
    /**
    * Returns a unique string identifying the form.
    *
    * @return string
    * The unique string identifying the form.
    */
    public function getFormId() {
        return 'movie_settings';
    }
    /**
    * {@inheritdoc}
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Empty implementation of the abstract submit class.
    }
    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['movie_settings']['#markup'] = 'Settings form for movie. We
        don\'t need additional entity settings. Manage field settings with the
        tabs above.';
        return $form;
    }
}
