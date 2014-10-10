<?php
$POSTFILE = file_get_contents("posts.txt");
#Checks For Anonymous User :)
$CHECK = $_GET['anonymous'];
if ($CHECK == "true") {
echo '<html style="color:lime;background:black;font-family:Courier New;">
<form method="POST">
<b>You Are Currently Anonymous</b><br><br>
<input type="Text" name="post" autocomplete="off" style="width:1000;">
<input type="Submit" name="spost" value="Submit Post">
<input type="Submit" name="refresh" value="Del Posts.txt">
</form>
<p style="background:white;color:black;">'.$POSTFILE.'</p>
</html>
';
if (isset($_POST['refresh'])) {
unlink('posts.txt');
echo "<script>location.replace('index.php')</script>";
}



if (isset($_POST['spost'])) {
$GPOST = $_POST['post'];
$POST = "Anonymous > ".$GPOST;
$FILE = "posts.txt";
$FO = fopen($FILE, "a");
$FW = fwrite($FO, $POST."<br/>");
fclose($FO);
echo "<script>location.replace('index.php?anonymous=true')</script>";
}else{};
}else {
$IP = $_SERVER['REMOTE_ADDR'];
echo '<html style="color:lime;background:black;font-family:Courier New;">
<form method="POST">
<input type="Text" name="post" autocomplete="off" style="width:1000;">
<input type="Submit" name="spost" value="Submit Post">
</form>
<p style="background:white;color:black;">'.$POSTFILE.'</p>
</html>
';
if (isset($_POST['spost'])) {
$GPOST = $_POST['post'];
$POST = $IP." > ".$GPOST;
$FILE = "posts.txt";
$FO = fopen($FILE, "a");
$FW = fwrite($FO, $POST.'<br/>');
fclose($FO);
echo "<script>location.replace('index.php')</script>";
}else{};
}
?>
