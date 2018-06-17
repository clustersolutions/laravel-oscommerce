<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\CoreUpdate\RPC;

  use OSC\Core\Site\Admin\Application\CoreUpdate\CoreUpdate;
  use OSC\Core\Site\RPC\Controller as RPC;

  class GetPackageContents {
    public static function execute() {
      if ( !isset($_GET['search']) ) {
        $_GET['search'] = '';
      }

      if ( !empty($_GET['search']) ) {
        $result = CoreUpdate::findPackageContents($_GET['search']);
      } else {
        $result = CoreUpdate::getPackageContents();
      }

      $result['rpcStatus'] = RPC::STATUS_SUCCESS;

      echo json_encode($result);
    }
  }
?>