<?php

require_once("2checkout-php/lib/Twocheckout.php");
$params = array(
    'sid' => '250340018006',
    'mode' => '2CO',
    'li_0_name' => 'Test Product',
    'li_0_price' => '0.01'
);

$form = Twocheckout_Charge::form($params, 'auto');
?>

<!-- <form id="2checkout" action="https://www.2checkout.com/checkout/spurchase" method="post">
<input type="hidden" name="sid" value="250340018006"/>
<input type="hidden" name="mode" value="2CO"/>
<input type="hidden" name="li_0_name" value="Test Product"/>
<input type="hidden" name="li_0_price" value="0.01"/>
<input type="submit" value="Click here if you are not redirected automatically" /></form>
<script type="text/javascript">document.getElementById('2checkout').submit();</script> -->