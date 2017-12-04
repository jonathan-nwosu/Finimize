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



