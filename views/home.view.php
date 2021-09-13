<?
$user=new User(); 
$users_count = $user->count();

$file=new File();
$audio_count = $file->count("user_id=".$_SESSION['user']['id']." AND file_tip='audio'");
$video_count = $file->count("user_id=".$_SESSION['user']['id']." AND file_tip='video'");
$files_count = $audio_count+$video_count;
?>

		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
					<div class="info">
						<h4>Users</h4>
						<p><b><?=$users_count?></b></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
					<div class="info">
						<h4>Your files</h4>
						<p><b><?=$files_count?></b></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
					<div class="info">
						<h4>Your files</h4>
						<p><b><?=$files_count?></b></p>
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
					<h3 class="tile-title">Audio/Video</h3>
					<div class="embed-responsive embed-responsive-16by9">
						<canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
	var data = {
		labels: ["January", "February", "March", "April", "May"],
		datasets: [
		{
			label: "My First dataset",
			fillColor: "rgba(220,220,220,0.2)",
			strokeColor: "rgba(220,220,220,1)",
			pointColor: "rgba(220,220,220,1)",
			pointStrokeColor: "#fff",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(220,220,220,1)",
			data: [65, 59, 80, 81, 56]
		},
		{
			label: "My Second dataset",
			fillColor: "rgba(151,187,205,0.2)",
			strokeColor: "rgba(151,187,205,1)",
			pointColor: "rgba(151,187,205,1)",
			pointStrokeColor: "#fff",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(151,187,205,1)",
			data: [28, 48, 40, 19, 86]
		}
		]
	};
	var pdata = [
	{
		value: <?=$video_count?>,
		color: "#46BFBD",
		highlight: "#5AD3D1",
		label: "Your Video"
	},
	{
		value: <?=$audio_count?>,
		color:"#F7464A",
		highlight: "#FF5A5E",
		label: "Your Audios"
	}
	]


</script>
