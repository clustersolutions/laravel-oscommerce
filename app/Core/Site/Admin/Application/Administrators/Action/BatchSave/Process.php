<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Application\Administrators\Action\BatchSave;

  use OSC\Core\ApplicationAbstract;
  use OSC\Core\Site\Admin\Application\Administrators\Administrators;
  use OSC\Core\Registry;
  use OSC\Core\OSCOM;
  use OSC\Core\Access;

  class Process {
    public static function execute(ApplicationAbstract $application) {
      $error = false;

      foreach ( $_POST['batch'] as $id ) {
        if ( !Administrators::setAccessLevels($id, $_POST['modules'], $_POST['mode']) ) {
          $error = true;
          break;
        }
      }

      if ( $error === false ) {
        Registry::get('MessageStack')->add(null, OSCOM::getDef('ms_success_action_performed'), 'success');

        if ( in_array($_SESSION[OSCOM::getSite()]['id'], $_POST['batch']) ) {
          $_SESSION[OSCOM::getSite()]['access'] = Access::getUserLevels($_SESSION[OSCOM::getSite()]['id']);
        }
      } else {
        Registry::get('MessageStack')->add(null, OSCOM::getDef('ms_error_action_not_performed'), 'error');
      }

      OSCOM::redirect(OSCOM::getLink());
    }
  }
?>
