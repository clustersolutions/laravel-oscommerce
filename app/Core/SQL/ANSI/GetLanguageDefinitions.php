<?php
/**
 * osCommerce Online Merchant
 *
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\SQL\ANSI;

  use OSC\Core\Registry;

/**
 * @since v3.0.3
 */

  class GetLanguageDefinitions {
    public static function execute($data) {
      $OSCOM_PDO = Registry::get('PDO');

      $Qdef = $OSCOM_PDO->prepare('select * from :table_languages_definitions where languages_id = :languages_id and content_group = :content_group');
      $Qdef->bindInt(':languages_id', $data['language_id']);
      $Qdef->bindValue(':content_group', $data['group']);
      $Qdef->setCache('languages-' . $data['language_id'] . '-' . $data['group']);
      $Qdef->execute();

      return $Qdef->fetchAll();
    }
  }
?>
