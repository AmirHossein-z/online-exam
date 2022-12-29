<?php

error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('error_log', './');

require "app/core/config.php";
require "app/core/Controller.php";
require "app/core/Model.php";
require "app/app.php";

new App();