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
  use OSC\Core\Site\Admin\Application\Administrators\Administrators;

  $OSCOM_ObjectInfo = new ObjectInfo(Administrators::get($_GET['id']));
?>

<h1><?php echo $OSCOM_Template->getIcon(32) . HTML::link(OSCOM::getLink(), $OSCOM_Template->getPageTitle()); ?></h1>

<?php
  if ( $OSCOM_MessageStack->exists() ) {
    echo $OSCOM_MessageStack->get();
  }
?>

<div class="infoBox">
  <h3><?php echo HTML::icon('trash.png') . ' ' . $OSCOM_ObjectInfo->getProtected('user_name'); ?></h3>

  <form name="aDelete" class="dataForm" action="<?php echo OSCOM::getLink(null, null, 'Delete&Process&id=' . $OSCOM_ObjectInfo->getInt('id')); ?>" method="post">

  <p><?php echo OSCOM::getDef('introduction_delete_administrator'); ?></p>

  <p><?php echo '<b>' . $OSCOM_ObjectInfo->get('user_name') . '</b>'; ?></p>

  <p><?php echo HTML::button(array('priority' => 'primary', 'icon' => 'trash', 'title' => OSCOM::getDef('button_delete'))) . ' ' . HTML::button(array('href' => OSCOM::getLink(), 'priority' => 'secondary', 'icon' => 'close', 'title' => OSCOM::getDef('button_cancel'))); ?></p>

  </form>
</div>
