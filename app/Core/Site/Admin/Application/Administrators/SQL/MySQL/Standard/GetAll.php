<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Administrators\SQL\MySQL\Standard;

  use OSC\Core\Registry;

  class GetAll {
    public static function execute($data) {
      $OSCOM_PDO = Registry::get('PDO');

      $result = array();

      $sql_query = 'select SQL_CALC_FOUND_ROWS * from :table_administrators order by user_name';

      if ( $data['batch_pageset'] !== -1 ) {
        $sql_query .= ' limit :batch_pageset, :batch_max_results';
      }

      $sql_query .= '; select found_rows();';

      $Qadmins = $OSCOM_PDO->prepare($sql_query);

      if ( $data['batch_pageset'] !== -1 ) {
        $Qadmins->bindInt(':batch_pageset', $OSCOM_PDO->getBatchFrom($data['batch_pageset'], $data['batch_max_results']));
        $Qadmins->bindInt(':batch_max_results', $data['batch_max_results']);
      }

      $Qadmins->execute();

      $result['entries'] = $Qadmins->fetchAll();

      $Qadmins->nextRowset();

      $result['total'] = $Qadmins->fetchColumn();

      return $result;
    }
  }
?>
