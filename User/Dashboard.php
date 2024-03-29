<?php 
session_start();
include('config.php');
$ID=$_SESSION['ID'];

$a="SELECT Email FROM user_db WHERE ID='$ID'";
$b=mysqli_query($conn,$a);
$c=mysqli_fetch_array($b);
$d=$c['Email'];

$query3="SELECT * from transfer_record where ID='$ID'";
$result3=mysqli_query($conn,$query3);
$present3=mysqli_num_rows($result3);
if($present3>0){
$Total3=mysqli_num_rows($result3);
}else{
  $Total3=0;
}


$sql="SELECT Amount from balance where ID='$ID'";
$result=mysqli_query($conn,$sql);
$present=mysqli_num_rows($result);
if($present>0)
{
  $row=mysqli_fetch_array($result);
  $Total=$row['Amount'];
}else{
$Total=0;
}

$query="SELECT * from deposit_record where ID='$ID'";
$result1=mysqli_query($conn,$query);
$present1=mysqli_num_rows($result1);
if($present>0){
$Total1=mysqli_num_rows($result1);
}else{
  $Total1=0;
}

$querys="SELECT * from withdrawal_record where ID='$ID'";
$result2=mysqli_query($conn,$querys);
$present2=mysqli_num_rows($result2);
if($present>0){
$Total2=mysqli_num_rows($result2);
}else{
  $Total2=0;
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
</body>
</html>
<?php include('master.php'); ?>
	<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">RJ International Bank</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Welcome to the fastest, most efficient and completely private bank in the whole world.</p>
    </div>
    <div class="flex flex-wrap -m-4 text-center">
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M8 17l4 4 4-4m-4-5v9"></path>
            <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900"> ₹<?php echo $Total ?></h2>
          <p class="leading-relaxed">Balance</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $Total1 ?></h2>
          <p class="leading-relaxed">Deposits</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M3 18v-6a9 9 0 0118 0v6"></path>
            <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $Total2 ?></h2>
          <p class="leading-relaxed">Withdrawals</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $Total3 ?></h2>
          <p class="leading-relaxed">Transfer</p>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
</body>
</html>