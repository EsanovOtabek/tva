<?
/* ======================================************======================================*/
require_once 'model.php';
/**
 * 
 */
class User extends Model
{

	public function login($params=[],$arg=null)
	{
		foreach ($params as $key => $value) {
			$$key=$this->escapeString($value);
		}

		$sql = "email='$email' and password='$password'";

		if($this->count($sql)==1){
			session_start();
			$row = $this->select($sql);
			$_SESSION['user']=$row[0];

			return $this->output("You are logged in.");
		}
		
		return $this->output("Login or password is incorrect.","/auth");
	}

	public function register($params=[],$arg=null)
	{
		foreach ($params as $key => $value) {
			$$key=$this->escapeString(trim($value));
		}

		$error=0;
		$out="";

		if (!preg_match("/^[a-zA-Z ]+$/",$fio)) {
			$error++;
			$out.="Name must contain only alphabets and space\\n";
		}
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error++;
			$out.="Please Enter Valid Email ID\\n";
		}
		if(strlen($password) < 6) {
			$error++;
			$out.="Password must be minimum of 6 characters\\n";
		}

		if($error == 0){
			$_shrft[9]='#';
			$api_key=explode("#", $_shrft)[0].rand(100,999);
			$res=$this->addUser($fio,$email,$password,$api_key);
			$out=($res)?"You have successfully registered":"Auth Error";
		}

		return $this->output($out);
	}

	public function select($params="")
	{
		if($params!="") $params="WHERE ".$params;
		$sql = "SELECT * FROM users ".$params;
		return $this->find($sql);
	}

	public function count($params="")
	{
		if($params!="") $params="WHERE ".$params;
		$sql = "SELECT * FROM users ".$params;
		return $this->counter($sql);
	}

	public function addUser($fio,$email,$password,$api_key="")
	{
		$sql = "INSERT INTO users(fio, email, password, api_key) VALUES ('$fio','$email','$password','$api_key')";
		$res = $this->query($sql);
		return $res;
	}

}

class File extends Model
{

	public function select($params="")
	{
		if($params!="") $params="WHERE ".$params;
		$sql = "SELECT * FROM files ".$params;
		return $this->find($sql);
	}

	public function count($params="")
	{
		if($params!="") $params="WHERE ".$params;
		$sql = "SELECT * FROM files ".$params;
		return $this->counter($sql);
	}

	public function findid($id,$userid="")
	{
		if($userid!="") $userid=" AND user_id=".$userid;
		$sql = "SELECT * FROM files WHERE id=".$id.$userid;
		$res = $this->query($sql);
		return mysqli_fetch_assoc($res);
	}

	public function delete($id,$userid="")
	{
		if($userid!="") $userid=" AND user_id=".$userid;
		$sql = "DELETE FROM files WHERE id=".$id.$userid;
		return $this->query($sql);
	}

	public function add($params=[],$file)
	{
		$error=0;
		foreach ($params as $key => $value) {
			$$key=$this->escapeString(trim($value));
			if(empty($$key)) $error++;
		}

		$out="";		
		$ext=pathinfo($file['file']['name'],PATHINFO_EXTENSION);
		$filename=$file_tip."_".time().".".$ext;

		if($error == 0 && $this->fileUpload($file['file'],"files",$filename)){

			$file_link="http://tva.lifepc.uz/files/video_1632052852.mp4.mp4";
			require_once 'app/transcription.php';
			$rev=new Revai;
			$rev_json=json_decode($rev->jobs($file_link),true);
			$rev_arr=(array)$rev_json;
			$rev_job_id=$rev_arr['id'];

			$res=$this->addFile($name,$author,$filename,$language,$file_tip,$rev_job_id);
			$out=($res)?"file uploaded":"file upload error";

		}else{
			$out="Error";
		}

		return $this->output($out,"/add");
	}

	public function addFile($name,$author,$filename,$language,$file_tip,$rev_job_id)
	{
		$user_id=$_SESSION['user']['id'];
		$sql = "INSERT INTO files (name, author, file, language, file_tip, matn, rev_job_id, summary, summary_2, keywords, highlight, user_id) VALUES ('$name', '$author', '$filename', '$language', '$file_tip', 'in_progress', '$rev_job_id', 'in_progress','in_progress', 'in_progress', 'in_progress', '$user_id')";
		$res = $this->query($sql);
		return $res;
	}

	public function update($id,$rev_job_id)
	{
		$user_id=$_SESSION['user']['id'];

		require_once 'app/transcription.php';
		$rev=new Revai;
		
		require 'app/textgears.php';
		$textgear=new TextGears();

		$tr_matn=$rev->transcription($rev_job_id);
		$tr_matn=$this->ubText($tr_matn);
		$matn=$this->escapeString($tr_matn);

		$arr_matn=$textgear->suggest($matn);
		$corrected_matn=$arr_matn['response']['corrected'];

		$summary=$corrected_matn;
		$summary_2=$corrected_matn;

		// python ntlk summarizer
		require_once 'summarizer.php';
		if(strlen($corrected_matn)>40){
			$summary = $this->pySummarizer($corrected_matn)['result'];
		}else{
			$summary = $this->pySummarizer($corrected_matn)['result'];
		}

		//textgears summarizer
		$arr_summary = (array)$textgear->summarize($corrected_matn)['response'];
		$keywords=implode("\n", $arr_summary['keywords']);
		$highlight=implode(" ", $arr_summary['highlight']);

		if(strlen($corrected_matn)>40){
			$summary_2=implode("\n", (array)$arr_summary['summary']);
		}


		$sql = "UPDATE `files` SET matn='$matn', summary='$summary', summary_2='$summary_2', keywords='$keywords', highlight='$highlight' WHERE id=$id AND user_id='$user_id'";
		$res = $this->query($sql);
		return $res;
	}

	public function checkRevai($rev_job_id)
	{
		require_once 'app/transcription.php';
		$rev=new Revai;
		$res=$rev->getProgress($rev_job_id);
		$arr=(array)json_decode($res,true);
        return $arr;
	}

	public function ubText($str)
	{
	    $str=str_replace("Speaker 0", " ", $str);
	    $str=str_replace("Speaker 1", " ", $str);
	    $str=str_replace("Speaker 2", " ", $str);
	    $str=str_replace("Speaker 3", " ", $str);

	    $txt="";
	    for ($i=0; $i < strlen($str); $i++) { 
	        if($str[$i]=='0'&&$str[$i+2]==':'&&$str[$i+5]==':'){
	            $i=$i+9;
	        }
	        $txt.=$str[$i];
	    }
	    $txt=str_replace('.', '. ', $txt);
	    return trim($txt);
	}

}