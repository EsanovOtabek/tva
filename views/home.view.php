		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
					<div class="info">
						<h4>Users</h4>
						<p><b><? $obj=new User(); echo $obj->count(); ?></b></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
					<div class="info">
						<h4>Your files</h4>
						<p><b><? $obj=new File(); echo $obj->count("user_id=".$_SESSION['user']['id']); ?></b></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
					<div class="info">
						<h4>Your files</h4>
						<p><b><? $obj=new File(); echo $obj->count("user_id=".$_SESSION['user']['id']); ?></b></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
					<div class="info">
						<h4>Stars</h4>
						<p><b>500</b></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="tile">
					<h3 class="tile-title">Monthly Sales</h3>
					<div class="embed-responsive embed-responsive-16by9">
						<canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="tile">
					<h3 class="tile-title">Support Requests</h3>
					<div class="embed-responsive embed-responsive-16by9">
						<canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
					</div>
				</div>
			</div>
		</div>