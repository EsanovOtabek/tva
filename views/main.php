<?
	if(!(isset($_SESSION['user'])&&count($_SESSION['user'])>2)){
		header("location: auth");
	}
	$params=$param;
	
	$_SESSION['menu']=[
		"/" => "Home",
		"/add" => "Add Speech",
		"/video" => "Videos",
		"/audio" => "Audios",
		"/profile" => "Profile",
		"/logout" => "Logout",
	];

	$url = explode('/', trim($_GET['url'],'/'));
?>
	<!-- Html Head -->
	<? include_once 'include/head.php'; ?>
	<body class="app sidebar-mini">
	<!-- Navbar-->
	<? include_once 'include/header.php'; ?>
	<!-- Sidebar menu-->
	<? include_once 'include/sidebar.php'; ?>


	<!-- App Content -->
	<main class="app-content">
	<? include_once 'include/app-title.php'; ?>

		<?=$content?>

	</main>
		
	<!-- Essential javascripts for application to work-->
	<? include_once 'include/script.php'; ?>
	<?=$script?>
	</body>
</html>
