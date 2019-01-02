<?php
require_once 'vendor/autoload.php';

use ccxt\ccxt;

date_default_timezone_set('UTC');
$exchange = new \ccxt\binance(array(
    // 'verbose' => true, // for debugging
    'timeout' => 30000
));
$exchange->verbose = true;


try {
    // WARNING !!!
    // DO NOT CALL THIS MORE THAN ONCE IN 2 MINUTES OR YOU WILL GET BANNED BY BINANCE!
    // https://github.com/binance-exchange/binance-official-api-docs/blob/master/rest-api.md#limits
    $tick = $exchange->fetch_tickers();
    //            print_r ($result);

}
catch (Exception $e) {
    echo '[Error] ' . $e->getMessage() . "\n";
}
