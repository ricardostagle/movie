<?php
namespace Drupal\movie\Controller;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Url;
use Drupal\movie\Entity\Movie;
use Symfony\Component\HttpFoundation\RedirectResponse;
/**
* Class MoviePublishController
*/
class MoviePublishController extends ControllerBase {
    public function Render(Movie $movie) {
        // We set the moderation to published
        $new_state = 'published';
        $movie->set('moderation_state', $new_state);
        if ($movie instanceof RevisionLogInterface) {
            $movie->setRevisionLogMessage('Changed moderation state to Published.');
            $movie->setRevisionUserId($this->currentUser()->id());
        }
        $movie->save();
        $publishedMovie = Url::fromRoute('entity.movie.canonical',['movie' => $movie->id()]);
        \Drupal::messenger()->addMessage($movie->label() . ' is published.');
        return new RedirectResponse($publishedMovie->toString());
    }
    public function Access(Movie $movie) {
        // Securing no one is trying to publish other people's offers.
        $access = AccessResult::allowedIf($movie->access('view'));
        // Make sure state is draft
        if($movie->get('moderation_state')->getString() != 'draft') {
        $access = AccessResult::forbidden();
        }
        return $access;
    }
}