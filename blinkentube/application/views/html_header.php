<!DOCTYPE html>
<html>
<head>
<meta name="description" content="Blinkenlights in your browser -  powered by Javascript" />
<meta name="keywords" content="Blinkenlights,Javascript,Blinkenmovie" />
<meta name="author" content="Claude Hohl" />
<meta charset="utf-8">
<title>Javascript Blinkenlights</title>
<?php

//Carabiner
$this->carabiner->config(array(
	'script_dir' => 'files/js/', 
	'style_dir'  => 'files/css/',
	'cache_dir'  => 'files/asset/',
	'base_uri'	 => base_url(),
	'combine'	 => true,
	//'dev'		 => true,
));

//CSS
$this->carabiner->css('style.css');

$this->carabiner->css('blinkenbuilding.css');
$this->carabiner->css('blinkenbuilding_arcade.css');

if($this->uri->segment(1) == 'embed'){
	$this->carabiner->css('blinkenbuilding-embed.css');
	$this->carabiner->css('blinkenbuilding_arcade-embed.css');
}

if($this->agent->platform() == 'Mac OS X' && $this->agent->browser() == 'Firefox'){
	$this->carabiner->css('firefox-mac.css');
}else

if(stristr($this->agent->platform(), 'Windows') && $this->agent->browser() == 'Firefox'){
	$this->carabiner->css('firefox-win.css');
}else

if($this->agent->platform() == 'Linux' && $this->agent->browser() == 'Firefox'){
	$this->carabiner->css('firefox-linux.css');
}

$this->carabiner->display('css'); 

?>
<script type="text/javascript">
//<![CDATA[
var base_url = '<?php echo base_url(); ?>';
//]]>
</script>
</head>
<body>

