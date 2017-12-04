# Finimize

I created a simple one page web page for potential users to calculate the amount of tax they have to pay. The technologies
I chose were based on the technologies that I was most familiar with. The programming languages included: 

* HTML
* CSS
* Javascript
* PHP

I used an old template I already had for the JS moving slide background. It's important for me to say that the CSS is 
not my own and had been taken from a previous project. But both the JS and CSS had been tweaked and modified for the purpose of this 
particular task. 

# Overview

2 main parts to the index script: 

1. The basic HTML script that includes a sign up form and makes use of the HTTP POST technology. 

```html

<!DOCTYPE HTML>

<html>

	<head>
		
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	
	<body>

		<!-- Header -->
			<header id="header">
				<h1>Finimize Tax Calculator</h1>
				<p>The best place to calculate your taxes! <br><br> Join the 10,000+ others who have also calculated their taxes: </p>
			</header>

			<!-- Signup Form -->
			<form id="signup-form" method="post" action="">
				<input type="number" name="income" id="income" placeholder="Taxable income" />
				<input type="submit" value="Calculate Tax" name="submit"/>
			</form>
		
		<!-- Footer -->
			<footer id="footer">
				<ul class="copyright">
					<li>&copy; Finimize</li>
				</ul>
			</footer>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>

</html>

```

2. For the calculation I opted for PHP, mainly because of it's simplicity and because it's easy and very quick to get a working prototype
done in under a few hours with PHP. 

```PHP

<?php

// Check for empty fields
if((isset($_POST['income']))&&(!empty($_POST['income']))){

$income = $_POST['income'];

// Remove all illegal characters from email
$income = filter_var($income, FILTER_VALIDATE_INT);

echo "<div style= 'font-size: 20pt;'>";

if (!filter_var($income, FILTER_VALIDATE_INT) === false){
		
	if ($income > 0 && $income <= 11500) {
    	$roundedIncome = round($income, 2);
    	echo 'Tax to pay: £ 0';

	} elseif ($income >= 11501 && $income <= 45000) {
		$tax = (($income/100)*20);
		$roundedTax = round($tax, 2);
		echo 'Tax to pay: £ '. $roundedTax;

	} elseif ($income >= 45001 && $income <= 150000) {
		$tax  = (($income/100)*40);
		$roundedTax = round($tax , 2);
		echo 'Tax to pay: £ '. $roundedTax;

	} elseif ($income > 150000) {
		$tax = (($income/100)*45);
		$roundedTax = round($tax, 2);
		echo 'Tax to pay: £ '. $roundedTax;
	}

echo "    :)) </div>";

	return true;

	} 
}

?>

```

# Testing

Ways to test/open script: 

1. The index file is a PHP file so cannot just be open from a browser. In order to open the file you must set upa  local
environment and have some sort of virtual server running in the background. 

# Copyright

Finimize. Content cannot be used for commercial use.
