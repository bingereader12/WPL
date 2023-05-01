<?php  
include('../config.php');

if(isset($_POST['btn-send'])){

$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];

$e= $a.$b.$c.$d;

$sql="SELECT * FROM admin_user_db WHERE VCode='$e'";
$st=mysqli_query($conn,$sql);
$sn=mysqli_num_rows($st);

if($sn>0){
    $sa = mysqli_fetch_array($st);
    $ID=$sa['ID'];
    $Email=$sa['Email'];
    $Pass=$sa['Password'];

    $sql1="INSERT INTO admin_login(ID,Email,Password)VALUES($ID,'$Email','$Pass')";
    $ro=mysqli_query($conn,$sql1);
    header('location: /Banking_System_Final/Admin/login_form.php');

    $to_email = $Email;
    $subject = "RD Bank Contact Form";
    $body = "Hi,\n\nYour account has been verified.\n\nYours sincerely,\nAdmin\nRD BANK ";
    $headers = "From: wplrdbank@gmail.com";

         mail($to_email, $subject, $body, $headers);

}else{
    echo "WRONG ENTRY";
    header("Location: index.php");
}

}


?>


<html>
    <head>
        <title>OTP Verification</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body>
        <form action="" method="post">
        <div class="container">
            <h3 class="title">OTP Verification</h3>
            <p class="sub-title">Enter the OTP you received</p>
            <div class="wrapper">
              <input name="a" type="text" class="field 1" maxlength="1">
              <input name="b" type="text" class="field 2" maxlength="1">
              <input name="c" type="text" class="field 3" maxlength="1">
              <input name="d" type="text" class="field 4" maxlength="1">
            </div>
            <!-- <button class="resend">
              Resend OTP
              <i class="fa fa-caret-right"></i>
            </button> -->
            <div class="md:w-10/12 text-center md:pl-6 item-center" >
              <button name='btn-send' class="text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-center">
                <div class="sn"> &nbsp; &nbsp; &nbsp; Verify OTP</div>
    
              </button>
            </div>
          </div>
      </form>
          <script src="script.js"></script>
    </body>
</html>