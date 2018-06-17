<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\ZoneGroups\SQL\ANSI;

  use OSC\Core\Registry;

/**
 * @since v3.0.3
 */

  class Delete {
    public static function execute($data) {
      $OSCOM_PDO = Registry::get('PDO');

      $Qzone = $OSCOM_PDO->prepare('delete from :table_geo_zones where geo_zone_id = :geo_zone_id');
      $Qzone->bindInt(':geo_zone_id', $data['id']);
      $Qzone->execute();

      return ( $Qzone->rowCount() === 1 );
    }
  }
?>
