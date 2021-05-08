<head>
    <meta charset="utf-8">
    <title>Crypto Price</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php

header("refresh: 5;");
$url = 'https://api.binance.com/api/v3/ticker/price';
$data = file_get_contents($url);
$json = json_decode($data,true);


$btc ='';
$eth= '';
$cake = '';
$bal = '';
$uni = '';
$sushi ='';


foreach($json as $k => $v){

    if($v['symbol'] == 'BTCUSDT'){
        $btc = $v['price'];
        $btc = round($btc,0);
    }elseif($v['symbol'] == 'ETHUSDT' ){
        $eth = $v['price'];
        $eth = round($eth,0);
    }elseif($v['symbol'] == 'CAKEUSDT' ){
        $cake = $v['price'];
        $cake = round($cake,3);
    }elseif($v['symbol'] == 'BALUSDT' ){
        $bal = $v['price'];
        $bal = round($bal,3);
    }elseif($v['symbol'] == 'UNIUSDT' ){
        $uni = $v['price'];
        $uni = round($uni,3);
    }elseif($v['symbol'] == 'SUSHIUSDT' ){
        $sushi = $v['price'];
        $sushi = round($sushi,3);
    }

}

echo'<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">加密貨幣</th>
      <th scope="col">購入金額</th>
      <th scope="col">購入價格</th>
      <th scope="col">當前價格</th>
      <th scope="col">漲跌</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Bitcoin</td>
      <td>18</td>
      <td>50434</td>
      <td>'.$btc.'</td>
      <td>'.round((($btc-50434)/50434)*100,2).'%</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>ETH</td>
      <td>96.7</td>
      <td>1894.33</td>
      <td>'.$eth.'</td>
      <td>'.round((($eth-1894.33)/1894.33)*100,2).'%</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Cake</td>
      <td>75.2</td>
      <td>38.446</td>
      <td>'.$cake.'</td>
      <td>'.round((($cake-38.446)/38.446)*100,2).'%</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Uni</td>
      <td>100</td>
      <td>39.5</td>
      <td>'.$uni.'</td>
      <td>'.round((($uni-39.5)/39.5)*100,2).'%</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Bal</td>
      <td>100</td>
      <td>70.511</td>
      <td>'.$bal.'</td>
      <td>'.round((($bal-70.511)/70.511)*100,2).'%</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Sushi</td>
      <td>117</td>
      <td>15.972</td>
      <td>'.$sushi.'</td>
      <td>'.round((($sushi-15.972)/15.972)*100,2).'%</td>
    </tr>
    
  </tbody>
</table>';

?>