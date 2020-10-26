<?php

session_start();
if (isset($_SESSION['username'])) {
    $_SESSION['message'] = "login first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<h3><b><em>enock chatroom</em></b></h3>
<title>let's chat</title>
<link type="text/css" rel="stylesheet" href="stylechatroom.css"n>
</head>
<h2><b><em>join chatroom to chat with the best coders and hackers</em></b></h2>
 <body>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username'];?></b></p>
        <p class="logout"><a id="exit" href="login.php">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
        <link rel="stylesheet" type="text/javascript" href="scroll.js">
        <link rel="stylesheet" type="text/javascript" href="log.js">
        <link rel="stylesheet" type="text/css" href="stream.js">
    </div>
     
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div><br>
<div id="home">
        <a href="index.php"><em style="color: blue">back to homepage</em></a>
    </div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function() {
 $('#exit').click(function() {
    var exit = confirm("are you sure you want to end the session?");
    if (exit==true) {
window.location = 'index.php?logout=true';
    }
 }
});

 $("#submitmsg").click(function) {
    var clientmsg = $("#usermsg").val();
    $.post("server.php", { text: clientmsg });
    $("#usermsg").attr("value", "");
        return false;
 };
</script>
</body>
</html>