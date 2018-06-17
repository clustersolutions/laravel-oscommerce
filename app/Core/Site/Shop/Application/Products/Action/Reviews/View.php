<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\Site\Shop\Application\Products\Action\Reviews;

  use OSC\Core\ApplicationAbstract;
  use OSC\Core\Registry;
  use OSC\Core\Site\Shop\Reviews;
  use OSC\Core\Site\Shop\Product;
  use OSC\Core\OSCOM;

  class View {
    public static function execute(ApplicationAbstract $application) {
      $OSCOM_Service = Registry::get('Service');
      $OSCOM_Breadcrumb = Registry::get('Breadcrumb');

      $review_check = false;

      if ( is_numeric($_GET['View']) ) {
        if ( Reviews::exists($_GET['View']) ) {
          $review_check = true;

          Registry::set('Product', new Product(Reviews::getProductID($_GET['View'])));
          $OSCOM_Product = Registry::get('Product');

          $application->setPageTitle($OSCOM_Product->getTitle());
          $application->setPageContent('reviews_view.php');

          if ( $OSCOM_Service->isStarted('Breadcrumb')) {
            $OSCOM_Breadcrumb->add($OSCOM_Product->getTitle(), OSCOM::getLink(null, null, 'Reviews&View=' . $_GET['View'] . '&' . $OSCOM_Product->getKeyword()));
          }
        }
      }

      if ( $review_check === false ) {
        $application->setPageContent('reviews_not_found.php');
      }
    }
  }
?>
