<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Dashboard\Model;

  use OSC\Core\OSCOM;

  class saveShortcut {
    public static function execute($admin_id, $application) {
      $data = array('admin_id' => $admin_id,
                    'application' => $application);

      return OSCOM::callDB('Admin\Dashboard\SaveShortcut', $data);
    }
  }
?>
