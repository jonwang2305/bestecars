<?php
$email = $_POST['email'];
$password = $_POST['pwd'];
//$data = $email . "," . $password;

$file = "userInfo.csv";
file_put_contents($file, $email . PHP_EOL, FILE_APPEND);

mail($email, "bestecars Registration", "You have successfully registered.", "From:" ."jonwang72@gmail.com");
echo "Confirmation Email Sent. Thank you, we will contact you shortly.";
?>