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
  <h3><?php echo HTML::icon('new.png') . ' ' . OSCOM::getDef('action_heading_new_card'); ?></h3>

  <form name="ccNew" class="dataForm" action="<?php echo OSCOM::getLink(null, null, 'Save&Process'); ?>" method="post">

  <p><?php echo OSCOM::getDef('introduction_new_card'); ?></p>

  <fieldset>
    <p><label for="credit_card_name"><?php echo OSCOM::getDef('field_name'); ?></label><?php echo HTML::inputField('credit_card_name'); ?></p>
    <p><label for="pattern"><?php echo OSCOM::getDef('field_pattern'); ?></label><?php echo HTML::inputField('pattern'); ?></p>
    <p><label for="sort_order"><?php echo OSCOM::getDef('field_sort_order'); ?></label><?php echo HTML::inputField('sort_order'); ?></p>
    <p><label for="credit_card_status"><?php echo OSCOM::getDef('field_status'); ?></label><?php echo HTML::checkboxField('credit_card_status', '1'); ?></p>
  </fieldset>

  <p><?php echo HTML::button(array('priority' => 'primary', 'icon' => 'check', 'title' => OSCOM::getDef('button_save'))) . ' ' . HTML::button(array('href' => OSCOM::getLink(), 'priority' => 'secondary', 'icon' => 'close', 'title' => OSCOM::getDef('button_cancel'))); ?></p>

  </form>
</div>