<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die("This page only accepts POST requests.");
}

$email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$errors = [];

if( $_POST["name"] && $_POST["email"] && $_POST["message"]) {
  if (preg_match("/[^A-Za-z]/",$_POST['name'] )) {
    $errors[] = "Invalid name";
  }
  if (!preg_match($email_regex,$_POST['email'] )) {
    $errors[] = "Invalid email address";
  }
  if (mb_strlen($_POST['message']) > 250) {
    $errors[] = "Input must be under 250 characters.";
  }

   if (empty($errors)) {
	$to = "contact@carlosmeister.com"
	$subject = "New message from website";
	$message = "Name: " . $_POST["name"] . "\n"
		 . "Email: " . $_POST["email"] . "\n"
		 . "Message: " . $_POST["message"] . "\n";
	$headers = "From: contact@carlosmeister.com" . "\r\n"
		 . "Reply-To: " . $_POST["email"] . "\r\n";
		 . "X-Mailer: PHP/" . phpversion();
	mail($to, $subject, $message, $headers);
	header("Location: https://www.carlosmeister.com");
        exit();
   }
} else {
  $errors[] = "An error occurred";
}

?>

<html>
   <body>
      <?php
        if (!empty($errors)) {
          echo "<ul>";
          foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
          }
          echo "</ul>";
        }
      ?>
   
      <form action = "<?php $_PHP_SELF ?>" method = "POST">
         Name: <input type = "text" name = "name" />
         Email: <input type = "text" name = "email" />
         Message: <input type = "text" name = "message" />
         <input type = "submit" />
      </form>
   
   </body>
</html>
