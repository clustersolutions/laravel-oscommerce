<?php
/**
 * osCommerce Online Merchant
 *
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\SQL\ANSI;

  use OSC\Core\Registry;

/**
 * @since v3.0.3
 */

  class GetAccessUserLevels {
    public static function execute($data) {
      $OSCOM_PDO = Registry::get('PDO');

      $Qaccess = $OSCOM_PDO->prepare('select module from :table_administrators_access where administrators_id = :administrators_id');
      $Qaccess->bindInt(':administrators_id', $data['id']);
      $Qaccess->execute();

      return $Qaccess->fetchAll();
    }
  }
?>