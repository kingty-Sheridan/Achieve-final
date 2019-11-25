<?php
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Ach1eve$$');
define('DB_NAME', 'kingty_login');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("Database connection failed: " . $link ->connect_error);
}
$id=$_REQUEST['id'];
$query = "SELECT * FROM users where id = $id"; 
$result = mysqli_query($link, $query) or die ( mysqli_error($link));
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #8cc745;
}
 
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Ach1eve$$');
define('DB_NAME', 'kingty_login');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("Database connection failed: " . $link ->connect_error);
}
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$update= "UPDATE users SET username = $username, password='$password' WHERE id=$id;";

mysqli_query($link, $update) or die(mysqli_error($link));

$status = "Record Updated Successfully. ";

echo $status;
echo "<a href='welcome.php'>Go back to main portal</a>";

}else {
?>
<form class="form-signin" method="POST">
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input name="username" type="hidden" value="<?php echo $row['username'];?>" />
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
	  
	  <input type="password" name="password" class="form-control" placeholder="password" required value="<?php echo $row['password'];?>" >
	</div>
	<br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        
      </form>
	  <?php } ?>
</body>
</html>