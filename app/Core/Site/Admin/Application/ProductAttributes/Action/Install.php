<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\ProductAttributes\Action;

  use OSC\Core\ApplicationAbstract;

/**
 * @since v3.0.3
 */

  class Install {
    public static function execute(ApplicationAbstract $application) {
      $application->setPageContent('install.php');
    }
  }
?>