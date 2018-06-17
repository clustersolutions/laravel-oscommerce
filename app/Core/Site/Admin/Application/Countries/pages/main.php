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

<form id="liveSearchForm">
  <?php echo HTML::inputField('search', null, 'id="liveSearchField" class="searchField" placeholder="' . OSCOM::getDef('placeholder_search') . '"') . HTML::button(array('type' => 'button', 'params' => 'onclick="osC_DataTable.reset();"', 'title' => OSCOM::getDef('button_reset'))); ?>

  <span style="float: right;"><?php echo HTML::button(array('href' => OSCOM::getLink(null, null, 'Save'), 'icon' => 'plus', 'title' => OSCOM::getDef('button_insert'))); ?></span>
</form>

<div style="padding: 20px 5px 5px 5px; height: 16px;">
  <span id="batchTotalPages"></span>
  <span id="batchPageLinks"></span>
</div>

<form name="batch" action="#" method="post">

<table border="0" width="100%" cellspacing="0" cellpadding="2" class="dataTable" id="countryDataTable">
  <thead>
    <tr>
      <th><?php echo OSCOM::getDef('table_heading_countries'); ?></th>
      <th width="20">&nbsp;</th>
      <th><?php echo OSCOM::getDef('table_heading_code'); ?></th>
      <th width="150"><?php echo OSCOM::getDef('table_heading_action'); ?></th>
      <th align="center" width="20"><?php echo HTML::checkboxField('batchFlag', null, null, 'onclick="flagCheckboxes(this);"'); ?></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th align="right" colspan="4"><?php echo HTML::submitImage(HTML::iconRaw('trash.png'), OSCOM::getDef('icon_trash'), 'onclick="document.batch.action=\'' . OSCOM::getLink(null, null, 'BatchDelete') . '\';"'); ?></th>
      <th align="center" width="20"><?php echo HTML::checkboxField('batchFlag', null, null, 'onclick="flagCheckboxes(this);"'); ?></th>
    </tr>
  </tfoot>
  <tbody>
  </tbody>
</table>

</form>

<div style="padding: 2px;">
  <span id="dataTableLegend"><?php echo '<b>' . OSCOM::getDef('table_action_legend') . '</b> ' . HTML::icon('edit.png') . '&nbsp;' . OSCOM::getDef('icon_edit') . '&nbsp;&nbsp;' . HTML::icon('trash.png') . '&nbsp;' . OSCOM::getDef('icon_trash'); ?></span>
  <span id="batchPullDownMenu"></span>
</div>

<script type="text/javascript">
  var moduleParamsCookieName = 'oscom_admin_' + pageModule;
  var dataTablePageSetName = 'page';

  var moduleParams = new Object();
  moduleParams[dataTablePageSetName] = 1;
  moduleParams['search'] = '';

  if ( $.cookie(moduleParamsCookieName) != null ) {
    moduleParams = $.secureEvalJSON($.cookie(moduleParamsCookieName));
  }

  var dataTableName = 'countryDataTable';
  var dataTableDataURL = '<?php echo OSCOM::getRPCLink(null, null, 'GetAll'); ?>';

  var countryLink = '<?php echo OSCOM::getLink(null, null, 'id=COUNTRYID'); ?>';
  var countryLinkIcon = '<?php echo HTML::icon('folder.png'); ?>';

  var countryFlag = '<?php echo HTML::image(OSCOM::getPublicSiteLink('images/worldflags/COUNTRYISOCODE2.png', null, 'Shop'), 'COUNTRYNAME'); ?>';

  var countryEditLink = '<?php echo OSCOM::getLink(null, null, 'Save&id=COUNTRYID'); ?>';
  var countryEditLinkIcon = '<?php echo HTML::icon('edit.png'); ?>';

  var countryDeleteLink = '<?php echo OSCOM::getLink(null, null, 'Delete&id=COUNTRYID'); ?>';
  var countryDeleteLinkIcon = '<?php echo HTML::icon('trash.png'); ?>';

  var osC_DataTable = new osC_DataTable();
  osC_DataTable.load();

  function feedDataTable(data) {
    var rowCounter = 0;

    for ( var r in data.entries ) {
      var record = data.entries[r];

      var newRow = $('#' + dataTableName)[0].tBodies[0].insertRow(rowCounter);
      newRow.id = 'row' + parseInt(record.countries_id);

      $('#row' + parseInt(record.countries_id)).hover( function() { $(this).addClass('mouseOver'); }, function() { $(this).removeClass('mouseOver'); }).click(function(event) {
        if (event.target.type !== 'checkbox') {
          $(':checkbox', this).trigger('click');
        }
      }).css('cursor', 'pointer');

      var newCell = newRow.insertCell(0);
      newCell.innerHTML = countryLinkIcon + '&nbsp;<a href="' + countryLink.replace('COUNTRYID', parseInt(record.countries_id)) + '" class="parent">' + htmlSpecialChars(record.countries_name) + '</a><span style="float: right;">(' + parseInt(record.total_zones) + ')</span>';

      newCell = newRow.insertCell(1);
      newCell.innerHTML = countryFlag.replace('COUNTRYISOCODE2', htmlSpecialChars(record.countries_iso_code_2.toLowerCase())).replace('COUNTRYNAME', htmlSpecialChars(record.countries_name)).replace('COUNTRYNAME', htmlSpecialChars(record.countries_name));

      newCell = newRow.insertCell(2);
      newCell.innerHTML = htmlSpecialChars(record.countries_iso_code_2) + '&nbsp;&nbsp;&nbsp;&nbsp;' + htmlSpecialChars(record.countries_iso_code_3);

      newCell = newRow.insertCell(3);
      newCell.innerHTML = '<a href="' + countryEditLink.replace('COUNTRYID', parseInt(record.countries_id)) + '">' + countryEditLinkIcon + '</a>&nbsp;<a href="' + countryDeleteLink.replace('COUNTRYID', parseInt(record.countries_id)) + '">' + countryDeleteLinkIcon + '</a>';
      newCell.align = 'right';

      newCell = newRow.insertCell(4);
      newCell.innerHTML = '<input type="checkbox" name="batch[]" value="' + parseInt(record.countries_id) + '" id="batch' + parseInt(record.countries_id) + '" />';
      newCell.align = 'center';

      rowCounter++;
    }
  }
</script>
