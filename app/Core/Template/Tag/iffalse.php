<?php
/**
 * osCommerce Online Merchant
 *
 * @copyright Copyright (c) 2014 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Template\Tag;

  use OSC\Core\OSCOM;
  use OSC\Core\Registry;

/**
 * @since v3.0.3
 */

  class iffalse extends \OSC\Core\Template\TagAbstract {
    static protected $_parse_result = false;

    static public function execute($string) {
      $args = func_get_args();

      $OSCOM_Template = Registry::get('Template');

      $key = trim($args[1]);

      if ( strpos($key, ' ') !== false ) {
        list($key, $entry) = explode(' ', $key, 2);
      }

      if ( !$OSCOM_Template->valueExists($key) ) {
        if ( class_exists('osCommerce\\OM\\Core\\Site\\' . OSCOM::getSite() . '\\Application\\' . OSCOM::getSiteApplication() . '\\Module\\Template\\Value\\' . $key . '\\Controller') && is_subclass_of('osCommerce\\OM\\Core\\Site\\' . OSCOM::getSite() . '\\Application\\' . OSCOM::getSiteApplication() . '\\Module\\Template\\Value\\' . $key . '\\Controller', 'osCommerce\\OM\\Core\\Template\\ValueAbstract') ) {
          call_user_func(array('osCommerce\\OM\\Core\\Site\\' . OSCOM::getSite() . '\\Application\\' . OSCOM::getSiteApplication() . '\\Module\\Template\\Value\\' . $key . '\\Controller', 'initialize'));
        } elseif ( class_exists('osCommerce\\OM\\Core\\Site\\' . OSCOM::getSite() . '\\Module\\Template\\Value\\' . $key . '\\Controller') && is_subclass_of('osCommerce\\OM\\Core\\Site\\' . OSCOM::getSite() . '\\Module\\Template\\Value\\' . $key . '\\Controller', 'osCommerce\\OM\\Core\\Template\\ValueAbstract') ) {
          call_user_func(array('osCommerce\\OM\\Core\\Site\\' . OSCOM::getSite() . '\\Module\\Template\\Value\\' . $key . '\\Controller', 'initialize'));
        }
      }

      $is_false = false;

      if ( $OSCOM_Template->valueExists($key) ) {
        $value = $OSCOM_Template->getValue($key);

        if ( isset($entry) && is_array($value) ) {
          if ( isset($value[$entry]) && is_bool($value[$entry]) && ($value[$entry] === false) ) {
            $is_false = true;
          }
        } elseif ( is_bool($value) && ($value === false) ) {
          $is_false = true;
        }
      }

      $has_else = strpos($string, '{else}');

      $result = '';

      if ( $has_else !== false ) {
        if ( $is_false === true ) {
          $result = substr($string, 0, $has_else);
        } else {
          $result = substr($string, $has_else + 6); // strlen('{else}')==6
        }
      } elseif ( $is_false === true ) {
        $result = $string;
      }

      return $result;
    }
  }
?>
