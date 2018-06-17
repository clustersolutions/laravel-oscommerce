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
  use OSC\Core\Site\Admin\Application\Languages\Languages;

  $OSCOM_ObjectInfo = new ObjectInfo(Languages::getGroup($_GET['group']));
?>

<h1><?php echo $OSCOM_Template->getIcon(32) . HTML::link(OSCOM::getLink(), $OSCOM_Template->getPageTitle()); ?></h1>

<?php
  if ( $OSCOM_MessageStack->exists() ) {
    echo $OSCOM_MessageStack->get();
  }
?>

<div class="infoBox">
  <h3><?php echo HTML::icon('trash.png') . ' ' . HTML::outputProtected($_GET['group']); ?></h3>

  <form name="gDelete" class="dataForm" action="<?php echo OSCOM::getLink(null, null, 'DeleteGroup&Process&id=' . $_GET['id'] . '&group=' . $_GET['group']); ?>" method="post">

  <p><?php echo OSCOM::getDef('introduction_delete_definition_group'); ?></p>

  <p><?php echo '<b>' . HTML::outputProtected($_GET['group']) . '</b>'; ?></p>

  <p>

<?php
  foreach ( $OSCOM_ObjectInfo->get('entries') as $l ) {
    echo Languages::get($l['languages_id'], 'name') . ': ' . (int)$l['total_entries'] . '<br />';
  }
?>

  </p>

  <p><?php echo HTML::button(array('priority' => 'primary', 'icon' => 'trash', 'title' => OSCOM::getDef('button_delete'))) . ' ' . HTML::button(array('href' => OSCOM::getLink(null, null, 'id=' . $_GET['id']), 'priority' => 'secondary', 'icon' => 'close', 'title' => OSCOM::getDef('button_cancel'))); ?></p>

  </form>
</div>