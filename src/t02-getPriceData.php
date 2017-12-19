<?php
require_once 'vendor/autoload.php';

use ccxt\ccxt;

$poloniex = new \ccxt\poloniex  ();
$bittrex  = new \ccxt\bittrex   (array ('verbose' => true));
$quoine   = new \ccxt\zaif      ();

$poloniex_markets = $poloniex->load_markets ();

var_dump ($poloniex_markets);
var_dump ($bittrex->load_markets ());
var_dump ($quoine->load_markets ());

var_dump ($poloniex->fetch_order_book ($poloniex->symbols[0]));
var_dump ($bittrex->fetch_trades ('BTC/USD'));
var_dump ($quoine->fetch_ticker ('ETH/EUR'));
