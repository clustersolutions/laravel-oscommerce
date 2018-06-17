<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2012 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Configuration\SQL\ANSI;

  use OSC\Core\Registry;

/**
 * @since v3.0.3
 */

  class EntryGetAll {
    public static function execute($data) {
      $OSCOM_PDO = Registry::get('PDO');

      $result = array('entries' => array());

      $Qcfg = $OSCOM_PDO->prepare('select * from :table_configuration where configuration_group_id = :configuration_group_id order by sort_order, configuration_title');
      $Qcfg->bindInt(':configuration_group_id', $data['group_id']);
      $Qcfg->execute();

      $result['entries'] = $Qcfg->fetchAll();

      $result['total'] = count($result['entries']);

      return $result;
    }
  }
?>
