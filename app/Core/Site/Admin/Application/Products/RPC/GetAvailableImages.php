<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Products\RPC;

  use OSC\Core\DirectoryListing;
  use OSC\Core\OSCOM;
  use OSC\Core\Site\RPC\Controller as RPC;

/**
 * @since v3.0.3
 */

  class GetAvailableImages {
    public static function execute() {
      $result = array('images' => array());

      $OSCOM_DL = new DirectoryListing(OSCOM::getConfig('dir_fs_public', 'OSCOM') . 'upload');
      $OSCOM_DL->setIncludeDirectories(false);
      $OSCOM_DL->setCheckExtension('gif');
      $OSCOM_DL->setCheckExtension('jpg');
      $OSCOM_DL->setCheckExtension('png');

      foreach ( $OSCOM_DL->getFiles() as $f ) {
        $result['images'][] = $f['name'];
      }

      $result['rpcStatus'] = RPC::STATUS_SUCCESS;

      echo json_encode($result);
    }
  }
?>