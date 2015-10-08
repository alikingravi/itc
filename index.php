<?php
/**
 *  init.php contains the spl_autoloader function which loads all the classes, the controller and the sanitize function.
 *  The controller is then called which initiates the data request from ProductSourceData class.
 */
require_once 'core/init.php';

IndexController::index();