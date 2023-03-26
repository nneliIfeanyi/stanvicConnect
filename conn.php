<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "stanvicconnect";

if(!$data = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect");
}




function  check_login($data)
{
  if (isset($_SESSION['username'])) {
   
    $username = $_SESSION['username'];
    $query = "SELECT * FROM fellows WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($data, $query);

    if ($result && mysqli_num_rows($result) > 0) {
    
      $user_data = mysqli_fetch_assoc($result);
      return $user_data;
    }

  }else{ 
  //redirect to login

  header("location:loginmsg.php");

  }

}



function  dbdrop($data,$username,$spot,$phone,$password,$avatar){

  //Insert to database...

  $sql = "INSERT INTO fellows (username,address,phone,password,img) VALUES ('$username','$spot','$phone','$password','$avatar')";

  $result = mysqli_query($data, $sql);

  if ($result) {
    
    return true;

  }else{

   return false;
  }

}




function  check_username($data,$username){

  $check = "SELECT * FROM fellows WHERE username = '$username'";
  $check_user = mysqli_query($data, $check);
  $row_count = mysqli_num_rows($check_user);

    if ($row_count > 0){

      return true;

    }else{

      return false;
    }

}


function  check_email($data,$phone){


  $check = "SELECT * FROM fellows WHERE phone = '$phone'";
  $check_user = mysqli_query($data, $check);
  $row_count = mysqli_num_rows($check_user);

    if ($row_count > 0){

      return true;

    }else{

      return false;
    }

}


function login_pass($data,$username,$password){

  $sql = "SELECT * FROM fellows WHERE username = '$username'";
  $query = mysqli_query($data, $sql);
  $row_count = mysqli_num_rows($query);
  $guest = mysqli_fetch_assoc($query);

    if ($row_count > 0 && $guest['username'] == $username && $guest['password'] == $password){
      
      return true;
      
    }else{

      return false;
    }

}


function total_assets($data,$username)
{
  $sql = "SELECT SUM(price) FROM assets WHERE owner = '$username'";
  $query = mysqli_query($data, $sql);
  if ($query) {
    $result = mysqli_fetch_array($query);
    return $result[0];
  }
   
}

