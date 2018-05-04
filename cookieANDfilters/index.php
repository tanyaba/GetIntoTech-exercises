<!DOCTYPE html>
<?php
$cookie_name = "user";
$cookie_value = 1;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE['user'])) {
     echo "Cookie is not set!";
} else {
     echo "Value is: " . $_COOKIE[$cookie_name];
     $cookie_value=$cookie_value+1;
     echo"<br>new value is ".$cookie_value;
}
?>

<p><strong>Note:</strong> You might have to reload the page to see the value of the cookie.</p>

</body>
</html>
