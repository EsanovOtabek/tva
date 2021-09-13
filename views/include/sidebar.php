	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

	<aside class="app-sidebar">
		<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="50px" src="http://lifepc.uz/images/mini-logo.png" alt="LifePC">
			<div>
				<p class="app-sidebar__user-name"><?=$_SESSION['user']['fio']?></p>
				<p class="app-sidebar__user-designation">LifePC GrouP</p>
			</div>
		</div>
		<ul class="app-menu">
			
		<? foreach ($_SESSION['menu'] as $path => $name) { ?>
			<li><a class="app-menu__item <?if("/".$url[0]==$path)echo('active');?>" href="<?=DR.$path?>"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label"><?=$name?></span></a></li>
		<? } ?>

		</ul>
	</aside>