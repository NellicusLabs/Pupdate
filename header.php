<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$Result['title'];?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Allow web app to be run in full-screen mode. -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Configure the status bar. -->
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- Disable automatic phone number detection. -->
<meta name="format-detection" content="telephone=no">
<!-- Make the app title different than the page title. -->
<meta name="apple-mobile-web-app-title" content="Pupdate">
<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png?v=yyL5gOm753">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png?v=yyL5gOm753">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png?v=yyL5gOm753">
<link rel="manifest" href="images/favicon/site.webmanifest?v=yyL5gOm753">
<link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg?v=yyL5gOm753" color="#757575">
<link rel="shortcut icon" href="images/favicon/favicon.ico?v=yyL5gOm753">
<meta name="application-name" content="Pupdate">
<meta name="msapplication-TileColor" content="#757575">
<meta name="msapplication-config" content="images/favicon/browserconfig.xml?v=yyL5gOm753">
<meta name="theme-color" content="#757575">
<link rel="apple-touch-startup-image" href="images/splash/launch-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="images/splash/launch-750x1294.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="images/splash/launch-1242x2148.png" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="images/splash/launch-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="images/splash/launch-1536x2048.png" media="(min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="images/splash/launch-1668x2224.png" media="(min-device-width: 834px) and (max-device-width: 834px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
<link rel="apple-touch-startup-image" href="images/splash/launch-2048x2732.png" media="(min-device-width: 1024px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="css/padding-margin.css">
<link href="style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <div class="main-nav main-sel">
        <div class="container">
            <nav id="cssmenu">
				<div class="logo">
					<a href="dashboard.php"><img src="images/pet_icons/cup.svg"></a>
				</div>
				<div id="head-mobile"></div>
				<div class="button"></div>
				<ul class="navbar-right">
					<li class="active"><a href="dashboard.php">Home</a></li>
					<li><a href="#" data-toggle="modal" data-target="#addPetModal">Add pet</a></li>
					<li><a href="#" data-toggle="modal" data-target="#editSettings">Settings</a></li>
				</ul>
            </nav>
        </div>
    </div>
</header>
