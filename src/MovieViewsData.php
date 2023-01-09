<?php
namespace Drupal\movie;
use Drupal\views\EntityViewsData;
/**
* Provides views data for Movie entities.
*
*/
class MovieViewsData extends EntityViewsData {
    /**
    * Returns the Views data for the entity.
    */
    public function getViewsData() {
        $data = parent::getViewsData();
        $data['movie']['movie_entity_moderation_state_views_field'] = [
		'title' => t('Moderation status'),
		'field' => array(
		'title' => t('Moderation status'),
		'help' => t('Shows the state of the movie entity.'),
		'id' => 'movie_entity_moderation_state_views_field',
		),
	];
	$data['movie']['movie_entity_dynamic_operation_links'] = [
		'title' => t('Dynamic operations'),
		'field' => array(
		'title' => t('Dynamic operations'),
		'help' => t('Shows a dropbutton with dynamic operations for offers.'),
		'id' => 'movie_entity_dynamic_operation_links',
		),
	];
        return $data;
    }
}
