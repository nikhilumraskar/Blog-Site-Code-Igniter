<!DOCTYPE html>
<html>
<head>
	<!--link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"-->
  <?php echo link_tag('assets/css/bootstrap.css'); ?>
	<title>Admin Panel</title>
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url('login/logout')?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
