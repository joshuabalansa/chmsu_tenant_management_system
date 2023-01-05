<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tenant Registration</title>
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: arial;
		}

		.nav {
			width: 100%;
			height: 5rem;
			display: flex;
			align-items: center;
		}

		.nav-container {
			width: 100%;
			height: 60px;
			align-items: center;
			display: flex;
			justify-content: space-around;
		}

		.nav-container .nav-list-container {
			display: flex;
			width: 30%;
			align-items: center;

		}

		.nav-container .nav-list-container ul {
			display: flex;
			justify-content: space-evenly;
			list-style: none;
			width: 100%;
		}

		.nav-container .nav-list-container ul li a {
			color: #000;
			font-size: 20px;
			text-decoration: none;
		}

		.nav-container .nav-list-container ul li a:hover {
			text-decoration: underline;
		}

		.nav-container .button-9 {
			appearance: button;
			backface-visibility: hidden;
			background-color: #405cf5;
			border-radius: 6px;
			border-width: 0;
			box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .1) 0 2px 5px 0, rgba(0, 0, 0, .07) 0 1px 1px 0;
			box-sizing: border-box;
			color: #fff;
			cursor: pointer;
			font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
			font-size: 100%;
			height: 40px;
			line-height: 1.15;
			margin: 12px 0 0;
			outline: none;
			overflow: hidden;
			padding: 0 25px;
			position: relative;
			text-align: center;
			text-transform: none;
			transform: translateZ(0);
			transition: all .2s, box-shadow .08s ease-in;
			user-select: none;
			-webkit-user-select: none;
			touch-action: manipulation;
			width: 100px;
		}

		.button-9:disabled {
			cursor: default;
		}

		.button-9:focus {
			box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
		}


		.nav-container button:hover {
			background: green;
		}

		.main-container {
			display: flex;
			width: 100%;
			height: 100%;
			justify-content: space-between;
		}
	</style>
</head>

<body>
	<div class="nav">
		<div class="nav-container">
			<img src="assets/chmsu-logo.png" width="75" height="75" alt="">
			<div class="nav-list-container">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Guidelines</a></li>
					<li><a href="#">Services</a></li>
				</ul>
			</div>
			<button class="button-9">Sign in</button>
		</div>
	</div>
	<div class="main-container">
		<div class="left-container">Left</div>
		<div class="right-container">Right</div>
	</div>
</body>

</html>