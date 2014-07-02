<?php
include('config.php');
mysql_connect('localhost', 'jw72', 'dp22vwfy') or die("I couldn't connect to your database, please make sure your info is correct!");
mysql_select_db('UserInfo') or die("I couldn't find the database table make sure it's spelt right!");

//setup some variables
$action = array();
$action['result'] = null;
 
if(empty($_GET['email']) || empty($_GET['confirm_code'])){
    $action['result'] = 'error';
    $action['text'] = 'We are missing variables. Please double check your email.';          
}
         
if($action['result'] != 'error'){
    //cleanup the variables
    $email = mysql_real_escape_string($_GET['email']);
    $confirm_code = mysql_real_escape_string($_GET['confirm_code']);
     
    //check if the code is in the database
    $check_key = mysql_query("SELECT * FROM `Registration` WHERE `email` = '$email' AND `code` = '$confirm_code' LIMIT 1") or die(mysql_error());
     
    if(mysql_num_rows($check_key) != 0){
                 
        //get the confirm info
        $confirm_info = mysql_fetch_assoc($check_key);
         
        //confirm the email and update the users database
		$confirm_date = date("Y-m-d");
        $update_members = mysql_query("INSERT INTO `members` VALUES('$email', '$confirm_date', 0, NULL, 0)") or die(mysql_error());
        //delete email and confirmation code from registration table
        mysql_query("DELETE FROM `Registration` WHERE `email` = '$email' LIMIT 1") or die(mysql_error());
        mysql_query("DELETE FROM `Registration` WHERE `code` = '$confirm_code' LIMIT 1") or die(mysql_error());
        if($update_members){
            $action['result'] = 'success';
            $action['text'] = 'User has been confirmed. Thank you!';
		}else{
            $action['result'] = 'error';
            $action['text'] = 'The user could not be updated Reason: '.mysql_error();;    
        }
    }else{
        $action['result'] = 'error';
        $action['text'] = 'The key and email is not in our database.';
    }
}



?>

<html>
<head>
	<title>dfjasdklfjdsaklfjkasdjfdk</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="stylePractice.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body class="body">
	<header class="mainHeader">
		HELLO
		<nav><ul>
			<li class="active"><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul></nav>
	</header>
	
	<div class="mainContent">
		<div class="content">
			<article class="bottomContent">
			
				<content>
					<p>		Your account has been activated.</p>
				</content>
			</article>	
			
			
			
		</div>
	</div>

	<aside class="top-sidebar">
		<article>
			<h2>Top sidebar</h2>
			<p>djfklsdajfklsdjfkdsjfkldsjfkl</p>
		</article>
	</aside>
	
	<aside class="middle-sidebar">
		<article>
			<h2>Middle sidebar</h2>
			<p>djfklsdajfklsdjfkdsjfkldsjfkl</p>
		</article>
	</aside>
	
	<aside class="bottom-sidebar">
		<article>
			<h2>Bottom sidebar</h2>
			<p>djfklsdajfklsdjfkdsjfkldsjfkl</p>
		</article>
	</aside>
	
	<footer class="mainFooter">
		<p>fjksdlfjasdklfjdk</p>
	</footer>

</html>

	