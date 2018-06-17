<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Administrators\Model;

  use OSC\Core\OSCOM;

  class find {
    public static function execute($search, $pageset = 1) {
      $data = array('user_name' => $search,
                    'batch_pageset' => $pageset,
                    'batch_max_results' => MAX_DISPLAY_SEARCH_RESULTS);

      if ( !is_numeric($data['batch_pageset']) || (floor($data['batch_pageset']) != $data['batch_pageset']) ) {
        $data['batch_pageset'] = 1;
      }

      return OSCOM::callDB('Admin\Administrators\Find', $data);
    }
  }
?>
