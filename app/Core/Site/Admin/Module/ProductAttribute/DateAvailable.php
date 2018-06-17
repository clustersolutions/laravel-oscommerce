<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Admin\Module\ProductAttribute;

  use OSC\Core\HTML;

/**
 * @since v3.0.3
 */

  class DateAvailable extends \OSC\Core\Site\Admin\ProductAttributeModuleAbstract {
    public function getInputField($value) {
      return HTML::inputField('attributes[' . self::getID() . ']', $value, 'id="attributes_' . self::getID() . '"') . '<script>$(function() { $("#attributes_' . self::getID() . '").datepicker( { dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true } ); });</script>';
    }
  }
?>
