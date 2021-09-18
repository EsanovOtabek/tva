<?
require_once '../../app/controllers.php';

$api_key=$_GET['key'];

$user=new User;

$cnt=$user->count("api_key='".$api_key."'");

$row=$user->select("api_key='".$api_key."'")[0];

$json="";
if($cnt>0){

	if(!empty($_POST['text']) ){

		$txt=urlencode($_POST['text']);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://tva.lifepc.uz/summarizer?text=".$txt,
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
		  $json = $response;
		}

	}else{
		$json="{error: text empty!}";
	}

	$file=new File;
	$sql = "INSERT INTO files (name, author, file, language, file_tip, matn, summary, user_id) VALUES ('empty', '$row[fio]', 'not file', 'eng', 'not file', '$txt', '$json', '$row[id]')";
    $res = $file->query($sql);
}else{
	$json="{error: api key not found!}";
}
echo($json);