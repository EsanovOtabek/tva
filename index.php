<?php 

/* ******************
 * *
	@ = params
	$layout
	$title
	$style
	$script
	$content
	$params
 * *
****************** */
session_start();
require_once "app/config.php";
require_once "app/router.php";
require_once "app/controllers.php";

$router=new Router;

require_once 'app/web.php';

$page = $router->dispatch($_SERVER['REQUEST_URI']);
$content = $page['content'];
$link = $page['link'];
$layout="main";
if (!is_null($page['params'])) {
	extract($page['params']);
}
ob_start();
include_once "views/".$layout.".php";
echo ob_get_clean();
