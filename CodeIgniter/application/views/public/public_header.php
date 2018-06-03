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
	  <a class="navbar-brand" href="<?= base_URL('index.php/user')?>">Articles</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <?= form_open('user/search',['class'=>'form-inline my-2 my-lg-0']) ?>
	    <!-- <form class="form-inline my-2 my-lg-0"> -->
	      <input class="form-control mr-sm-2" name="query" type="text" placeholder="Search articles">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>
	    <?=form_error('query',"<p class= 'navbar-nav alert-danger'>","</p>")?>
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="<?= base_URL('index.php/login') ?>">Login <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	  </div>
	</nav>