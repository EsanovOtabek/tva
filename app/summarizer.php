<?php

 function pySummarizer($text)
{
	$text=urlencode($text);
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://bultakov.uz/summarizer?text=".$text,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$json="cURL Error #:" . $err;
	} else {
		$json = json_decode($response,true);
	}

	return $json;

}