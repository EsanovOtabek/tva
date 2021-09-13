<?
session_start();
$id=intval($_GET['id']);
if($id>0){
	require_once 'app/controllers.php';

	$class=ucfirst($_GET['object']);
	$object=new $class();
	$method_name="delete";

	if(method_exists($object, $method_name)){
		echo $object->$method_name($id,$_SESSION['user']['id']);
		$object=null;
	}
}
else{
	echo "Iltimos noto'g'ri harakatlarni amalga oshirmang!!!";
}
?>

