<?php
require_once 'vendor/autoload.php';

use ccxt\ccxt;

class MarketData
{

    public function handle()
    {
        $multi = array();

        $poloniex = new \ccxt\poloniex();
        $poloArray = $poloniex->load_markets();
        $multi = $this->updateMarket($poloArray, "poloniex");

        // print_r($poloArray);
        //insert poloniex markets into db
        $json_data = json_encode($multi);
        file_put_contents('data/myfile1.json', $json_data);
    }

    public function updateMarket($marketsArray, $exchangeName)
    {
        $resArray = array();
        foreach ($marketsArray as $key => $v) {
            var_dump($marketsArray[$key]['symbol']);

            try {
                ///save image to public folder
                $resArray[] = [$marketsArray[$key]['symbol'],$marketsArray[$key]['base'],$marketsArray[$key]['quote']];
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }
        return $resArray;
    }
}

$mk = new MarketData();
$mk->handle();
