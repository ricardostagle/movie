<?php
/**
* @file
* Contains Drupal\movie\Form\MovieForm.
*/
namespace Drupal\movie\Form;
use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
/**
* Form controller for the movie entity edit forms.
** @ingroup content_entity_example
*/
class MovieForm extends ContentEntityForm {
    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        /* @var $entity \Drupal\movie\Entity\Movie */
        $form = parent::buildForm($form, $form_state);
        $form['#attached'] = array(
            'library' => array('movie/movie'),
            'drupalSettings' => array(),
          );
        return $form;
    }
    /**
    * {@inheritdoc}
    */
    public function save(array $form, FormStateInterface $form_state) {
        // Redirect to movie list after save.
        $form_state->setRedirect('entity.movie.collection');
        $entity = $this->getEntity();
        $entity->save();
    }
}
