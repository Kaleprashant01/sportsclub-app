<?php
$host     = "127.0.0.1:4306"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name  = "sports_db"; // Database name 

// Connect to server and select databse.
$con = mysqli_connect($host, $username, $password, $db_name);

// Check connection

?>
<?php
function page_protect()
{
 
    
    global $db;
    
    /* Secure against Session Hijacking by checking user agent */
   // if (isset($_SESSION['HTTP_USER_AGENT'])) {
     //   if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
      //      session_destroy();
        //    echo "<meta http-equiv='refresh' content='0; url=../login/'>";
      //      exit();
      //  }
   // }
    
    // before we allow sessions, we need to check authentication key - ckey and ctime stored in database
    
    /* If session not set, check for cookies set by Remember me */
    
    
}
?>