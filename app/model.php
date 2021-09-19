<?
/**
 * 
 */
class Model
{

	public $db;

	public function __construct()
	{
		require_once 'config.php';
		$db=mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME) or die("DB Connection Error");
		$this->db = $db;
	}

	public function query($sql)
	{
		return mysqli_query($this->db, $sql);
	}

	public function find($sql)
	{
		$res = $this->query($sql);
		return mysqli_fetch_all($res,MYSQLI_ASSOC);
	}

	public function counter($sql)
	{
		$res = $this->query($sql);
		return mysqli_num_rows($res);
	}

	public function escapeString($str)
	{
		return mysqli_real_escape_string($this->db,$str);
	}

	public function output($str="Error",$path="/")
	{
		return "<script>alert('$str');location.href='".DR.$path."'</script>";
	}

	public function fileUpload($file,$path,$name,$size=10000000){
		if ($file['size']<$size&&$file['error']==0){
			$ext=pathinfo($file['name'],PATHINFO_EXTENSION);

			return move_uploaded_file($file['tmp_name'],$path."/".$name);
		}
		return false;
	}

	public function pySummarizer($text)
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
}
