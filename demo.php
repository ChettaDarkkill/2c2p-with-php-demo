<?php 
	//Merchant's account information
	$merchant_id = "JT04";			//Get MerchantID when opening account with 2C2P
	$secret_key = "QnmrnH6QE23N";	//Get SecretKey from 2C2P PGW Dashboard
	
	//Transaction information
	$payment_description  = '2 days 1 night hotel room';
	$order_id  = time();
	$currency = "764";
	$amount  = '000000002500';
	
	//Request information
	$version = "7.2";	
	$payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
	$result_url_1 = "http://localhost:8988/result.php";
	
	//Construct signature string
	$params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
	$hash_value = hash_hmac('sha1',$params, $secret_key,false);	//Compute hash value
	
	echo 'Payment information:';
	echo '<html> 
	<body>
	<form id="myform" method="post" action="'.$payment_url.'">
		<input type="hidden" name="version" value="'.$version.'"/>
		<input type="hidden" name="merchant_id" value="'.$merchant_id.'"/>
		<input type="hidden" name="currency" value="'.$currency.'"/>
		<input type="hidden" name="result_url_1" value="'.$result_url_1.'"/>
		<input type="hidden" name="hash_value" value="'.$hash_value.'"/>
    PRODUCT INFO : <input type="text" name="payment_description" value="'.$payment_description.'"  readonly/><br/>
		ORDER NO : <input type="text" name="order_id" value="'.$order_id.'"  readonly/><br/>
		AMOUNT: <input type="text" name="amount" value="'.$amount.'" readonly/><br/>
		<input type="submit" name="submit" value="Confirm" />
	</form>  
	
	<script type="text/javascript">
		document.forms.myform.submit();
	</script>
	</body>
	</html>';	 
?>