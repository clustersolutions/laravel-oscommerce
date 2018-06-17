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

<h1><?php echo $OSCOM_Template->getPageTitle(); ?></h1>

<p><?php echo OSCOM::getDef('shipping'); ?></p>

<div class="submitFormButtons" style="text-align: right;">
  <?php echo HTML::button(array('href' => OSCOM::getLink(), 'icon' => 'triangle-1-e', 'title' => OSCOM::getDef('button_continue'))); ?>
</div>