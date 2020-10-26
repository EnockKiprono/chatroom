<?php
session_start();
$server_name = "localhost:3306";
$username = "root";
$password = "enock";
$db = "persons";
$db = mysqli_connect('localhost' ,'root', 'registration');
if (isset($_POST['register'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
}
if (empty($username)) {
	array_push($errors, "username is required");
}
if (empty($email)) {
	array_push($errors, "email is required");
}
if (empty($password)) {
	array_push($errors, "password is required");
}
$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT=1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
if ($user) {
	if ($user['username'] == $username) {
		array_push($errors, "username already exists");
	}
	if ($user['email'] == $email){
		array_push($errors, "email already exists");
	}
}
if (count($errors) == 0) {
	$password = md5($password);
	$query = "INSERT INTO users(username,email,password) VALUES ('$username', '$email', '$password')";
	mysqli_query($db, $query);
$_SESSION['username'] = $username;
$_SESSION['success'] = "you are now logged in";
header('location : index.php');
}

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
}
if (empty($username)) {
	array_push($errors, "username is required");
}
if (empty($password)) {
	array_push($errors, "password is required");
}
if (count($errors) == 0) {
	$password = md5($password);
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	mysqli_query($db, $query);
	if (mysqli_num_rows($results) == 1) {
$_SESSION['username'] = $username;
$_SESSION['success'] = "you are now logged in";
header('location: index.php');
}
else {
	array_push($errors, "wrong username/password combination");
}

if (isset($_GET['logout'])) {
	$fp = fopen("login.html", 'a');
	fwrite($fp, "<div class='msgln'><i>user ". $_SESSION['username'] ." has left the chat session.</i><br></div>");
	fclose($fp);

	session_destroy();
	header("location: index.php");
}

session_start();
if (isset($_SESSION['username'])) {
	$text = $_POST['text'];

	$fp = fopen("login.html", 'a');
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <br>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
	fclose($fp);
}

        if (file_exists("login.html") $$ filesize("login.html") > 0) {
$handle = fopen("login.html", "r");
$contents = fread($handle, filesize("login.html"));
fclose($handle);

echo $contents;

    }
?>
