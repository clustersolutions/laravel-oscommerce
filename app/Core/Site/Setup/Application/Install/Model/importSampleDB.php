<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Setup\Application\Install\Model;

  use OSC\Core\OSCOM;
  use OSC\Core\PDO;
  use OSC\Core\Registry;

  class importSampleDB {
    public static function execute($data) {
      Registry::set('PDO', PDO::initialize($data['server'], $data['username'], $data['password'], $data['database'], $data['port'], $data['class']));

      OSCOM::callDB('Setup\Install\ImportSampleSQL', array('table_prefix' => $data['table_prefix']));
    }
  }
?>
