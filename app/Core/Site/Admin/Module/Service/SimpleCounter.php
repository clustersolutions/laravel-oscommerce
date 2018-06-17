<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Module\Service;

  use OSC\Core\OSCOM;

/**
 * @since v3.0.2
 */

  class SimpleCounter extends \OSC\Core\Site\Admin\ServiceAbstract {
    protected function initialize() {
      $this->title = OSCOM::getDef('services_simple_counter_title');
      $this->description = OSCOM::getDef('services_simple_counter_description');
    }
  }
?>
