		<html>
		<head>
			<title>bestecars</title>
			<meta charset="utf-8" />
			
			<link rel="stylesheet" href="stylePractice.css" type="text/css" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		</head>

		<body class="body">
			<header class="mainHeader">
				Banner Image
				<nav><ul>
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul></nav>
			</header>
			<div class="mainContent">
				<div class="content">
					<article class="bottomContent">
						<header>
							<h2><a href="#" title="#">Sign In</a></h2>
						</header>
						
						<footer>
							<p class="post-info">Sign in/Register here
							</p>
						</footer>
					
						<content>
							<p>
									
			<form action="index.php" method="POST" />
				<form class="registerForm">
								<fieldset>
									<label>Email: </label>
									<input type="text" name="email"/>
								</fieldset>
								<fieldset>
			<?php
	if(isset($_POST['Button'])){

		mysql_connect('localhost', 'jw72', 'dp22vwfy') or die("I couldn't connect to your database, please make sure your info is correct!");
		mysql_select_db('UserInfo') or die("I couldn't find the database table make sure it's spelt right!");

		//no apostraphes for MYSQL injection
		$email = mysql_real_escape_string($_POST['email']);

		$trimmed_email=trim($email, "\t\r\n");
		$email=$trimmed_email;

		$lowercase_email = strtolower($email);
		$email=$lowercase_email;

		$action = array();
		$action['result'] = null;
		$text = array();

		//check if email is already registered

		$check_email = mysql_query("SELECT * FROM `members` WHERE `email` = '$email' LIMIT 1") or die(mysql_error());
		if (mysql_num_rows($check_email)!=0) {
			$action['result'] = 'success';
			array_push($text,'Welcome, you have now logged in.');

		}else{

		if(empty($email)){ 
			$action['result'] = 'error';
			array_push($text,'Please enter a valid email');
		}
		else if (strlen($email)>128){
			$action['result'] = 'error';
			array_push($text,'Input over 128 characters');
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$action['result'] = 'error';
			array_push($text,'Please enter a valid email');
		}
		if($action['result'] != 'error'){
			$confirm_code = md5(uniqid(rand()));
			$registration_date = date("Y-m-d");
			//add to the database
			$add = mysql_query("INSERT INTO `Registration` VALUES('$email','$confirm_code', '$registration_date')");

		if(!$add){
				$action['result'] = 'error';
				array_push($text,'User could not be added to the database. Reason: ' . mysql_error());  
			}
			else{
		$action['result'] = 'success';
			array_push($text,'Confirmation Email Sent. Thank you, we will contact you shortly.');
		//echo '<div id="form-submit-alert">Confirmation Email Sent. Thank you, we will contact you shortly.</div>'; 
		$message = "Click on this link to activate account. http://www.bestecars.com/confirmationPage.php?email=$email&confirm_code=$confirm_code";
		mail($email, "bestecars Registration", $message, "From:" ."bestecars@bestecars.com");
		}
		}
		/*
		$file = "userInfo.csv";
		$data = $email . "," . $confirm_code;
		file_put_contents($file, $data . PHP_EOL, FILE_APPEND);
		*/
		}
		$action['text']=$text;

		foreach($text as $text) {
			echo $text, '<br>';
		}
	}
		?>
			
									<input class ='button' type="submit" value="Login/Register" name="Button"/>
								</fieldset>
				</form>
							</p>
						</content>
					</article>	
					
					<article class="topContent">
						<header>
							<h2><a href="#" title="#">Rankings</a></h2>
						</header>
						
						<footer>
							<p class="post-info">June 2014</p>
						</footer>
						
						<content>
							<p>
				<?php
							$ecarsData = mysql_query("SELECT * FROM ecars");
							echo "<table border = 1 class='tble'>
							<tr>
							<th>Maker</th>
							<th>Model</th>
							<th>Votes</th>
							</tr>";
							while($record = mysql_fetch_array($ecarsData)){
							echo "<tr>";
							echo "<td>" . $record['maker'] . "</td>";
							echo "<td>" . $record['model'] . "</td>";
							echo "<td>" . $record['votes'] . "</td>";
							echo "</tr>";
							}
							echo "</table>";
				?>

	</p>
						</content>
					</article>	
					
				</div>
			</div>

			<aside class="top-sidebar">
				<article>
					<h2>Top sidebar</h2>
					<p></p>
				</article>
			</aside>
			
			<aside class="middle-sidebar">
				<article>
					<h2>Middle sidebar</h2>
			</aside>
			
			<aside class="bottom-sidebar">
				<article>
					<h2>Bottom sidebar</h2>
					<p></p>
				</article>
			</aside>
			
			<footer class="mainFooter">
				<p>mainFooter</p>
					<p>Footer Information</p>
				</article>
			</aside>
			</footer>

		</html>

			