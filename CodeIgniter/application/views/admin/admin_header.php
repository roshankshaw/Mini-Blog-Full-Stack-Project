<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Articles List</title>
	<!-- It can be done using URL helper by base_URL() function -->
	<!-- Using html helper by link_tag function -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<?= link_tag('assets/css/bootstrap.min.css') ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="<?= base_URL('index.php/admin/dashboard')?>">Admin Panel</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        	<a class="nav-link" href="<?= base_url('index.php/login/logout') ?>">Log out <span class="sr-only">(current)</span></a>
	      		<!-- or using anchor helper -->
	      		<!-- //anchor('login/logout','Logout') -->
	      </li>
	    </ul>
	  </div>
	</nav>