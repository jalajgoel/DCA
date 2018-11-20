<?php

if(!$_POST) { exit; }


if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");


$phone    = $_POST['phone'];
$message    = $_POST['message'];
$name    = $_POST['name'];
$email    = $_POST['email'];

if(trim($phone) == '' || trim($message) == '' || trim($name) == '' || trim($email) == '') {
	echo 'All fields are required';
	exit();
}

$address = "dehraduncollegeofart@gmail.com, Hello@dehraduncollegeofart.com, rsaini1707@gmail.com";

// Example, $e_subject = '$name . ' has contacted you via Your Website.';
$e_subject = 'DCA - Query from Website';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "DCA - Query from Website" . PHP_EOL . PHP_EOL;
$e_content = "Name: $name\n Email: $email\n Phone: $phone\n Message: $message" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact via $phone or $email";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From:info@dehraduncollegeofart.com" . PHP_EOL;
$headers .= "Reply-To:$email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.

	echo "SUCCESS";

} else {

	echo 'ERROR!';

}
?>