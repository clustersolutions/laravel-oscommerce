<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  use OSC\Core\OSCOM;
?>
<script type="text/javascript">
function checkForm(form_name) {
  var error = 0;
  var error_message = "<?php echo OSCOM::getDef('js_error'); ?>";

  var review = form_name.review.value;

  if (review.length < <?php echo REVIEW_TEXT_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo sprintf(OSCOM::getDef('js_review_text'), REVIEW_TEXT_MIN_LENGTH); ?>\n";
    error = 1;
  }

  if ((form_name.rating[0].checked) || (form_name.rating[1].checked) || (form_name.rating[2].checked) || (form_name.rating[3].checked) || (form_name.rating[4].checked)) {
  } else {
    error_message = error_message + "<?php echo OSCOM::getDef('js_review_rating'); ?>\n";
    error = 1;
  }

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
</script>
