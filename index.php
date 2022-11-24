<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// Declare variables and set them as empty
$inputError = ""; 
$inputText = "";
$welcome = "";
//$file = fopen('10-million-password-list-top-10000.txt','r');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["inputText"])) {
    $inputError = "inputText is required";
	} 
	else {
    $inputText = $_POST["inputText"];
    
	// Checks if input contains at least 10 characters
	$regex_char = '/\b[a-zA-Z0-9_ ]{10,}\b/'; // Regex accepts space
    if (!preg_match($regex_char, $inputText)) {
      $inputText = "";
	  $inputError = "Please enter at least 10 characters"; 
    }
	else {
		$welcome = "<h2>Welcome! Your Password Meets The Requirement:</h2>";
	}

    // Block common passwords
//	$regex_common = "";
//    if (preg_match($regex_common, $inputText)) {
//        $inputText = "";
//		$inputError = "Common password detected";
//      }
  } 
}
?>

<h2>Homepage</h2>
<form method="post">  
  Password: <input type="text" name="inputText">
  <input type="submit" name="submit" value="Login">  
  <br><br>
  <?php echo $inputError;?>
</form>

<?php
# Text that displays here is safe
echo $welcome;
echo $inputText;
?>

<br><br>

<a href="index.php">Logout</a>

</body>
</html>