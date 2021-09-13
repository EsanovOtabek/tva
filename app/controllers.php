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
    
	public function fileUpload($file,$path,$name,$size=50000000){
	if ($file['size']<$size&&$file['error']==0){
		$ext=pathinfo($file['name'],PATHINFO_EXTENSION);
		$fname=$name."-".rand().".".$ext;

		return move_uploaded_file($file['tmp_name'],$path."/".$fname);
	}
	return false;
}
}

/* ======================================************======================================*/

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
		$filename=$file_tip."_".time();
		$matn=$filename;
		$summary=$matn;
		if($error == 0 && $this->fileUpload($file['file'],"files",$filename)){
			$res=$this->addFile($name,$author,$filename,$language,$file_tip,$matn,$summary);
			$out=($res)?"file uploaded":"file upload error";
	    }else{
	    	$out="Error";
	    }

	    return $this->output($out,"/output");
	}

	public function addFile($name,$author,$file,$language,$file_tip,$matn,$summary)
	{
		$user_id=$_SESSION['user']['id'];
		$sql = "INSERT INTO files (name, author, file, language, file_tip, matn, summary, user_id) VALUES ('$name', '$author', '$file', '$language', '$file_tip', '$matn', '$summary', '$user_id')";
        $res = $this->query($sql);
        return $res;
	}



}