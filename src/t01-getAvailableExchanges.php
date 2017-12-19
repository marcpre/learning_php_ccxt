<?php
require_once 'vendor/autoload.php';

use ccxt\ccxt;

// Get all availabe exchanges
var_dump (\ccxt\Exchange::$exchanges);