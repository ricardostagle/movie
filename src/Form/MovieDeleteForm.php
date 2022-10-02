<?php
/**
* @file
* Contains \Drupal\movie\Form\MovieDeleteForm.
*/
namespace Drupal\movie\Form;
use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
/**
* Provides a form for deleting a content_entity_example entity.
*
* @ingroup movie
*/
class MovieDeleteForm extends ContentEntityConfirmFormBase {
    /**
    * {@inheritdoc}
    */
    public function getQuestion() {
        return $this->t('Are you sure you want to delete %name?',
        array('%name' => $this->entity->label()));
    }
    /**
    * {@inheritdoc}
    *
    * If the delete command is canceled, return to the movie.
    */
    public function getCancelUrl() {
        return Url::fromRoute('entity.movie.edit_form', [
            'movie' => $this->entity->id()
        ]);
    }
    /**
    * {@inheritdoc}
    */
    public function getConfirmText() {
        return $this->t('Delete');
    }
    /**
    * {@inheritdoc}
    *
    * Delete the entity
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $entity = $this->getEntity();
        $entity->delete();
        $this->logger('movie')->notice('deleted %title.',
            array(
                '%title' => $this->entity->label(),
            ));
        // Redirect to movie list after delete.
        $form_state->setRedirect('entity.movie.collection');
    }
}
