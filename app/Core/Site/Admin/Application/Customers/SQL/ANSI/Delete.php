<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Customers\SQL\ANSI;

  use OSC\Core\Registry;

/**
 * @since v3.0.3
 */

  class Delete {
    public static function execute($data) {
      $OSCOM_PDO = Registry::get('PDO');

      $Qdelete = $OSCOM_PDO->prepare('delete from :table_customers where customers_id = :customers_id');
      $Qdelete->bindInt(':customers_id', $data['id']);
      $Qdelete->execute();

      return ( $Qdelete->rowCount() === 1 );
    }
  }
?>
