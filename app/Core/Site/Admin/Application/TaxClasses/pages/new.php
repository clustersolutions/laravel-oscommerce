<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  use OSC\Core\HTML;
  use OSC\Core\OSCOM;
?>

<h1><?php echo $OSCOM_Template->getIcon(32) . HTML::link(OSCOM::getLink(), $OSCOM_Template->getPageTitle()); ?></h1>

<?php
  if ( $OSCOM_MessageStack->exists() ) {
    echo $OSCOM_MessageStack->get();
  }
?>

<div class="infoBox">
  <h3><?php echo HTML::icon('new.png') . ' ' . OSCOM::getDef('action_heading_new_tax_class'); ?></h3>

  <form name="tcNew" class="dataForm" action="<?php echo OSCOM::getLink(null, null, 'Save&Process'); ?>" method="post">

  <p><?php echo OSCOM::getDef('introduction_new_tax_class'); ?></p>

  <fieldset>
    <p><label for="tax_class_title"><?php echo OSCOM::getDef('field_title'); ?></label><?php echo HTML::inputField('tax_class_title'); ?></p>
    <p><label for="tax_class_description"><?php echo OSCOM::getDef('field_description'); ?></label><?php echo HTML::inputField('tax_class_description'); ?></p>
  </fieldset>

  <p><?php echo HTML::button(array('priority' => 'primary', 'icon' => 'check', 'title' => OSCOM::getDef('button_save'))) . ' ' . HTML::button(array('href' => OSCOM::getLink(), 'priority' => 'secondary', 'icon' => 'close', 'title' => OSCOM::getDef('button_cancel'))); ?></p>

  </form>
</div>
