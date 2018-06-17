<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Countries\Action;

  use OSC\Core\ApplicationAbstract;

  class ZoneDelete {
    public static function execute(ApplicationAbstract $application) {
      $application->setPageContent('zones_delete.php');
    }
  }
?>
