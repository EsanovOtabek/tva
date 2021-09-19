
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="row">

				<div class="col-lg-6">
					<div class="form-group">
						<label for="yourfioInput">Your Name</label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
							<input class="form-control form-control-lg" id="yourfioInput" type="name" name="fio" value="<?=$_SESSION['user']['fio']?>" readonly>
						</div>
					</div>

					<div class="form-group">
						<label for="yourEmailInput">Your Email address</label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
							<input class="form-control form-control-lg" id="yourEmailInput" name="email" type="email" value="<?=$_SESSION['user']['email']?>" readonly>
						</div>
					</div>
				</div>

				<div class="col-lg-4 offset-lg-1">
					<div class="form-group">
						<label for="YourRegDate">Your reg date time</label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
							<input class="form-control form-control-lg" id="YourRegDate" type="name" name="vaqt" value="<?=$_SESSION['user']['regdate']?>" readonly>
						</div>
					</div>

					<div class="form-group">
						<label for="yourApiKey">Your API KEY</label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">API_KEY</span></div>
							<input class="form-control form-control-lg" id="apiKeyCopy" name="api_key" type="text" value="<?=$_SESSION['user']['api_key']?>" readonly>
						</div>
					</div>
				</div>

			</div>
			<div class="tile-footer">
				<!-- <button class="btn btn-primary" type="submit">Submit</button> -->
			</div>
		</div>
		<div class="tile mb-4">

			<div class="row">
				<h2 style="margin-left: 12px;">Tva Api Docs</h2>
				<div class="col-lg-12">
					<hr>
					<hr>

					<h3 class="mb-3 line-head" id="nav-breadcrumbs">Api summary</h3>
					<h4 class="text-dark">http://tva.lifepc.uz/api/v2/summary.php?key=YOUR_API_KEY</h4>
					<br>
					<h4><span class="text-danger">POST['text']: </span><span class="text-primary"> "Your text"</span></h4>
				</div>

				<div class="col-lg-12">
					<hr>
					<hr>

					<h3 class="mb-3 line-head" id="nav-breadcrumbs">Api Transcription</h3>
					<h4 class="text-dark">http://tva.lifepc.uz/api/v2/transcription.php?key=YOUR_API_KEY</h4>
					<br>
					<h4><span class="text-danger">POST['url']: </span><span class="text-primary"> "media url"</span></h4>
				</div>
			</div>

		</div>
	</div>
</div>