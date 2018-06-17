<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Currencies\Model;

  use OSC\Core\OSCOM;

  class get {
    public static function execute($id, $key = null) {
      $data = array('id' => $id);

      $result = OSCOM::callDB('Admin\Currencies\Get', $data);

      if ( isset($key) ) {
        $result = $result[$key] ?: null;
      }

      return $result;
    }
  }
?>
