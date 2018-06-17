<?php
/**
 * osCommerce Online Merchant
 *
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace OSC\Core\PDO;

  class SQLite3 extends \OSC\Core\PDO {
    public function __construct($server, $username, $password, $database, $port, $driver_options) {
      $this->_server = $server;
      $this->_username = $username;
      $this->_password = $password;
      $this->_database = $database;
      $this->_port = $port;
      $this->_driver_options = $driver_options;
    }

    public function connect() {
      $dsn = 'sqlite:' . $this->_server;

      $this->_instance = new \PDO($dsn, $this->_username, $this->_password, $this->_driver_options);
    }
  }
?>