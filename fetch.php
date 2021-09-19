<?
session_start();
if(!empty($_SESSION['_shrft'])&&!empty($_POST['_shrft'])){
	require_once 'app/controllers.php';

	$class=ucfirst($_POST['object']);
	$object=new $class();
	$method_name=$_POST['method_name'];

	if(method_exists($object, $method_name)){
		echo $object->$method_name($_POST,$_FILES);
		$object=null;
	}
}
else{
	echo "Iltimos noto'g'ri harakatlarni amalga oshirmang!!!";
}
// if (!empty($_SESSION['_shrft'])) {
//     session_unset($_SESSION['_shrft']);
//     session_destroy($_SESSION['_shrft']);
// }
?>