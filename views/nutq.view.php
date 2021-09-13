<?
$nutq_id=$params['id'];
$file=new File();
$nutq=$file->findid($nutq_id,$_SESSION['user']['id']);
print_r($nutq);
?>