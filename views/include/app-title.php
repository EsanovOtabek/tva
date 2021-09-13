	<? $url = $_SERVER['REQUEST_URI']; ?>
		<div class="app-title">
			<div>
				<h1><?=$title?></h1>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="<?echo(DR.$url)?>"> <?=$_SESSION['menu'][$url]?></a></li>
			</ul>
		</div>