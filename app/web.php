<?php

$router->add("/404","404",[
	'title' => "404. NOT FOUND"
]);

$router->add("/","home",[
	'title'=>"TVA - Transcription Video and Audio. LifePC Group",
	"style"=>"<script src=\"".DR."/assets/js/plugins/chart.js\"></script>",
	"script"=>file_get_contents("app/txt/home-script.txt"),
	"layout"=>"main"
]);

$router->add("/video","list",[
	'title'=>"TVA - Videos",
	"style"=>"",
	"script"=>"<script src=\"".DR."/assets/js/plugins/jquery.dataTables.min.js\"></script> <script src=\"".DR."/assets/js/plugins/dataTables.bootstrap.min.js\"></script> <script>$('#sampleTable').DataTable();</script>",
	"layout"=>"main"
]);

$router->add("/audio","list",[
	'title'=>"TVA - Videos",
	"style"=>"",
	"script"=>"<script src=\"".DR."/assets/js/plugins/jquery.dataTables.min.js\"></script> <script src=\"".DR."/assets/js/plugins/dataTables.bootstrap.min.js\"></script> <script>$('#sampleTable').DataTable();</script>",
	"layout"=>"main"
]);

$router->add("/nutq/:id","nutq",[
	'title'=>"TVA - Nutq",
	"style"=>"",
	"script"=>"",
	"layout"=>"main"
]);

$router->add("/add","add",[
	'title'=>"TVA - Add Speech",
	"style"=>"",
	"script"=>"",
	"layout"=>"main"
]);

$router->add("/profile","profile",[
	'title'=>"TVA - User Profile",
	"style"=>"",
	"script"=>"",
	"layout"=>"main"
]);

$router->add("/auth","auth",[
	'title'=>"TVA - Login - Register",
	"style"=>"",
	"script"=>file_get_contents("app/txt/login-script.txt"),
	"layout"=>"blank"
]);

$router->add("/logout","logout",[
	'title'=>"TVA - Videos",
	"style"=>"",
	"script"=>"",
	"layout"=>"blank"
]);

