<?
$nutq_id=$params['id'];
$file=new File();
$nutq=$file->findid($nutq_id,$_SESSION['user']['id']);
// $summaryText=str_replace('.', '.', $nutq['summary']);
// $summaryText=htmlspecialchars_decode($summaryText);
?>
<style type="text/css">
.vjs-big-play-button{
	margin-top: 130px;
	margin-left: 40%;
}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<h3 class="tile-title"><?=$nutq['name']?></h3>
			<div class="row">
				<div class="col-md-12">
					<div class="tile-body">
						<? if($nutq['file_tip']=='video') {?>
						<video style="width:100%;" 
						id="my-video"
						class="video-js"
						controls
						preload="auto"
						height="400"
						data-setup="{}"
						>
						<source src="<?=DR."/files/".$nutq['file']?>" type="video/mp4" />
							<source src="<?=DR."/files/".$nutq['file']?>" type="video/mp4" />
								<p class="vjs-no-js">
									To view this video please enable JavaScript, and consider upgrading to a
									web browser that
									<a href="https://videojs.com/html5-video-support/" target="_blank"
									>supports HTML5 video</a
									>
								</p>
							</video>
							<?} else{?>
							<audio id="myAudio" controls>
								<source src="<?=DR."/files/".$nutq['file']?>" type="audio/ogg" />
								<source src="<?=DR."/files/".$nutq['file']?>" type="audio/mpeg" />
						  Your browser does not support the audio element.
							</audio>
						<?}?>
						</div>
					</div>
					<div class="col-md-12"><br><hr>
						<h3 class="tile-title"><?=ucfirst($nutq['file_tip'])?> transcription text:
							<select>
								<option value="en">English</option>
								<option value="uz">Uzbek</option>
								<option value="ru">Russian</option>
							</select>
						</h3>						
						<div class="form-group">
							<textarea class="form-control" rows="13" readonly="" id="trText"><?=$nutq['matn']?></textarea>
						</div>
						<div class="tile-footer"><a class="btn btn-primary" onclick="textCopy('trText')"><i class="fa fa-copy"></i> Text Copy</a></div>

					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
		<div class="col-md-12">
			<div class="tile">
				<div class="row">
					<div class="col-md-6"><br>
						<h3 class="tile-title"><?=ucfirst($nutq['file_tip'])?> summary with NLTK: 
							<select>
								<option value="en">English</option>
								<option value="uz">Uzbek</option>
								<option value="ru">Russian</option>
							</select>
						</h3>
						<hr>
						<div class="form-group">
							<textarea class="form-control" rows="16" readonly="" id="summary"><?=$nutq['summary']?></textarea>
						</div>
						<div class="tile-footer"><a class="btn btn-primary" onclick="textCopy('summary')"><i class="fa fa-copy"></i> Summary Copy</a></div>

					</div>
					<div class="col-md-6"><br>
						<h3 class="tile-title"><?=ucfirst($nutq['file_tip'])?> summary with TextGears:
							<select>
								<option value="en">English</option>
								<option value="uz">Uzbek</option>
								<option value="ru">Russian</option>
							</select>
						</h3>
						<hr>
						<div class="form-group">
							<textarea class="form-control" rows="16" readonly="" id="summary_2"><?=$nutq['summary_2']?></textarea>
						</div>
						<div class="tile-footer"><a class="btn btn-primary" onclick="textCopy('summary_2')"><i class="fa fa-copy"></i> Summary Copy</a></div>
					</div>

					<div class="col-md-6"><br>
						<h3 class="tile-title"><?=ucfirst($nutq['file_tip'])?> text highlight:
							<select>
								<option value="en">English</option>
								<option value="uz">Uzbek</option>
								<option value="ru">Russian</option>
							</select>
						</h3>
						<hr>
						<div class="form-group">
							<textarea class="form-control" rows="16" readonly="" id="highlight"><?=$nutq['highlight']?></textarea>
						</div>
						<div class="tile-footer"><a class="btn btn-primary" onclick="textCopy('highlight')"><i class="fa fa-copy"></i> Highlight Copy</a></div>

					</div>
					<div class="col-md-6"><br>
						<h3 class="tile-title"><?=ucfirst($nutq['file_tip'])?> text keywords:
							<select>
								<option value="en">English</option>
								<option value="uz">Uzbek</option>
								<option value="ru">Russian</option>
							</select>
						</h3>
						<hr>
						<div class="form-group">
							<textarea class="form-control" rows="16" readonly="" id="keywords"><?=$nutq['keywords']?></textarea>
						</div>
						<div class="tile-footer"><a class="btn btn-primary" onclick="textCopy('keywords')"><i class="fa fa-copy"></i> Keywords Copy</a></div>
					</div>

				</div>
			</div>
		</div>


	</div>

<script>
	function textCopy(id) {
		 var copyText = document.getElementById(id);

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /* For mobile devices */

		  /* Copy the text inside the text field */
		  navigator.clipboard.writeText(copyText.value);
		  
		  /* Alert the copied text */
		  alert("Copied the text: " + copyText.value);
	}
</script>