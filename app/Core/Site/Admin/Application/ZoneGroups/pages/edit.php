<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  use OSC\Core\HTML;
  use OSC\Core\ObjectInfo;
  use OSC\Core\OSCOM;
  use OSC\Core\Site\Admin\Application\ZoneGroups\ZoneGroups;

  $OSCOM_ObjectInfo = new ObjectInfo(ZoneGroups::get($_GET['id']));
?>

<h1><?php echo $OSCOM_Template->getIcon(32) . HTML::link(OSCOM::getLink(), $OSCOM_Template->getPageTitle()); ?></h1>

<?php
  if ( $OSCOM_MessageStack->exists() ) {
    echo $OSCOM_MessageStack->get();
  }
?>

<div class="infoBox">
  <h3><?php echo HTML::icon('edit.png') . ' ' . $OSCOM_ObjectInfo->getProtected('geo_zone_name'); ?></h3>

  <form name="zEdit" class="dataForm" action="<?php echo OSCOM::getLink(null, null, 'Save&Process&id=' . $OSCOM_ObjectInfo->getInt('geo_zone_id')); ?>" method="post">

  <p><?php echo OSCOM::getDef('introduction_edit_zone_group'); ?></p>

  <fieldset>
    <p><label for="zone_name"><?php echo OSCOM::getDef('field_name'); ?></label><?php echo HTML::inputField('zone_name', $OSCOM_ObjectInfo->get('geo_zone_name')); ?></p>
    <p><label for="zone_description"><?php echo OSCOM::getDef('field_description'); ?></label><?php echo HTML::inputField('zone_description', $OSCOM_ObjectInfo->get('geo_zone_description')); ?></p>
  </fieldset>

  <p><?php echo HTML::button(array('priority' => 'primary', 'icon' => 'check', 'title' => OSCOM::getDef('button_save'))) . ' ' . HTML::button(array('href' => OSCOM::getLink(), 'priority' => 'secondary', 'icon' => 'close', 'title' => OSCOM::getDef('button_cancel'))); ?></p>

  </form>
</div>