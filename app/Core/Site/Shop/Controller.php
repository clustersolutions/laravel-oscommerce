<?php
/**
 * osCommerce Online Merchant
 *
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Shop;

  use OSC\Core\Cache;
  use OSC\Core\MessageStack;
  use OSC\Core\OSCOM;
  use OSC\Core\PDO;
  use OSC\Core\Registry;
  use OSC\Core\Template;

  class Controller implements \OSC\Core\SiteInterface {
    protected static $_default_application = 'Index';

    public static function initialize() {
      Registry::set('MessageStack', new MessageStack());
      Registry::set('Cache', new Cache());
      Registry::set('PDO', PDO::initialize());

      foreach ( OSCOM::callDB('Shop\GetConfiguration', null, 'Site') as $param ) {
        define($param['cfgkey'], $param['cfgvalue']);
      }

      Registry::set('Service', new Service());
      Registry::get('Service')->start();

      Registry::set('Template', new Template());

      $application = 'OSC\\Core\\Site\\Shop\\Application\\' . OSCOM::getSiteApplication() . '\\Controller';
      Registry::set('Application', new $application());

      Registry::get('Template')->setApplication(Registry::get('Application'));
    }

    public static function getDefaultApplication() {
      return self::$_default_application;
    }

    public static function hasAccess($application) {
      return true;
    }
  }
?>