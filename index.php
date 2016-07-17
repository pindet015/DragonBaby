<!--
Author: banana45 / litttle john

-->

<!DOCTYPE html>
<html>
<head>
<title>Dragon Baby | Merchant Side</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Meeting Box Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Montserrat:700,400' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery.min.js"></script>
</head>
<body>
<div class="header">
	<h1><img src="images/poop.png" width="420" height="205"></h1>
</div>

        <div class="banner-top">
				<h2>Merchant Side</h2>
				<body>
		<form method="GET" action="gateway.php">
		  <p align="center">
		    <label for="txnid">
              <div align="center">Transaction ID
		      </div>
		    </label>
		  </p>
		  <p align="center">
		    <input type="text" name="txnid" />
	      </p>
			<p>
			  <label for="amount">
			    <div align="center"><br>
		        Amount</div>
		  </label>
		  </p>
		  <p align="center">
			  <input type="text" name="amount" />
		  </p>
		  <p align="center">&nbsp;</p>
		  <p align="center">
			  <label for="ccy">Currency<br>
		      </label>
			  <select name="ccy">
			    <option value="PHP">Philippine Peso</option>
			    <option value="USD">US Dollar</option>
			    <option value="CAD">Canadian Dollar</option>
			    </select>
		  </p>
		  <p align="center">&nbsp;</p>
			<p align="center">
			  <label for="description">Description</label>
		  </p>
		  <p align="center">
            <textarea name="description" style="margin: 0px; width: 253px; height: 117px;"> </textarea>
		  </p>
		  <p align="center">&nbsp;</p>
			<p align="center">
			  <label for="email">Email</label>
		  </p>
			<p align="center">
			  <input type="text" name="email" />
		  </p>
			<p align="center">&nbsp;</p>
			<p align="center">
				<input name="pay" type="submit" value="Pay via DragonPay" />
		  </p>
</form>
		<br/>
		<hr/>
		<br/>
		
				<!---start-date-piker---->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
			<script>
				$(function() {
				$( "#datepicker,#datepicker1" ).datepicker();
				});
			</script>
	<!---/End-date-piker---->
</div>
<div class="footer">
	<p>Powered By Banana45 | DragonBaby v.2</a></p>
</div>
</body>
</html>