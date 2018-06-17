<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Administrators\SQL\ANSI;

  use OSC\Core\Registry;

/**
 * @since v3.0.3
 */

  class Delete {
    public static function execute($data) {
      $OSCOM_PDO = Registry::get('PDO');

      $Qdel = $OSCOM_PDO->prepare('delete from :table_administrators where id = :id');
      $Qdel->bindInt(':id', $data['id']);
      $Qdel->execute();

      return ( $Qdel->rowCount() === 1 );
    }
  }
?>
