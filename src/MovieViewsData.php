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
        return $data;
    }
}
