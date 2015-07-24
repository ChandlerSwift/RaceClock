<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Chandler & Aidan">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>Swift Racing</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/custom.css" rel="stylesheet">
	
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Swift Racing</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="/">Stats</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="/admin/add-user.php">Add User</a></li>
				<li><a href="/admin/manual-race.php">Manual Race</a></li>
				<li><a href="/admin/correct-time.php">Correct Time</a></li>
				<li><a href="/admin/delete-race.php">Delete Race</a></li>
				<li role="separator" class="divider"></li>
				<li class="disabled"><a onclick="alert('Nice try.')" href="#">Shell Access</a></li>
			  </ul>
			</li>
            <li><a href="/race/">Race!</a></li>
			<li class="hidden-sm hidden-md hidden-lg"><a href="/user.php">Users</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li<?php if ($page == "Records") echo " class='active'";?>><a href="/">Records</a></li>
            <li<?php if ($page == "Dirt Bike Records") echo " class='active'";?>><a href="dirtbike.php">Dirt Bike Records</a></li>
            <li<?php if ($page == "Go-kart Records") echo " class='active'";?>><a href="/gokart.php">Go-kart Records</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li<?php if ($page == "User") echo " class='active'";?>><a href="/user.php">User Stats</a></li>
            <!--<li><a href="/user.php?user=Chandler Swift">Chandler Swift</a></li>
            <li><a href="/user.php?user=Jayden Rocha">Jayden Rocha</a></li>
            <li><a href="">Racer Names</a></li>-->
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">