<?php echo $this->Html->docType('html5'); ?>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<?php echo $this->Html->charset(); ?>

<?php echo $this->Html->meta(array('name' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1')); ?>

<title><?php echo $title_for_layout; ?></title>

<?php echo $this->Html->meta('keywords',''); ?>
<?php echo $this->Html->meta('description',''); ?>
<?php echo $this->Html->meta(array('name' => 'author', 'content' => 'Hardik Shah')); ?>
<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width')); ?>
<?php echo $this->Html->css('bootstrap.min.css'); ?>
<style>
	body {
	  padding-top: 60px;
	  padding-bottom: 40px;
	}
</style>
<?php echo $this->Html->css('bootstrap-responsive.min.css'); ?>
<?php echo $this->Html->css('style.css'); ?>

<?php echo $this->Html->script('libs/modernizr-2.5.3-respond-1.1.0.min'); ?>

<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
</head>
<body>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</a>
			<a class="brand" href="../Home">Project<span style="color: #52a8ec"><strong>Ally</strong></span></a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="../Home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<div style="float: right;" class="dropdown" >
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown trigger</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><input type="text"></li>
					</ul>
				</div>
			</div>
			
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
	<div id="add-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<?php 
			$name = $this->Session->read('name');
			if(isset($name)) {?>
			<ul class="nav nav-pills" style="padding-right: 100px;">
			  <li class="dropdown" style="float: right;" >
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			        <?php echo $name; ?>
			        <b class="caret"></b>
			    </a>
					<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
					  <!-- <li><a href="#">Action</a></li>
					  <li><a href="#">Another action</a></li>-->
					  
					  <li><a href="../Employee/userProfile">My Profile</a></li>
					  <li class="divider"></li>
					  <li><a href="../Home/logout">Logout</a></li>
					</ul>			   
			  	</li>
			</ul>
			<?php } ?>
					
	</div>

<div class="container">
	<div id="content">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<hr>
	<footer>
	<p>
		&copy; Company 2012
	</p>
	</footer>
</div>
<!-- /container -->

<?php echo $this->Html->script(array('libs/bootstrap/bootstrap.min','plugins','script')); ?>
<?php echo $this->fetch('script'); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo Configure::read('ga');?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>