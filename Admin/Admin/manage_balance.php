<?php 
session_start();
include('config.php');

if(isset($_POST['btn-send'])){

    $Amount=$_POST['amount'];
    $tid=$_POST['tid'];

    $bal="UPDATE balance SET Amount='$Amount' WHERE ID='$tid' ";
    $ral=mysqli_query($conn,$bal);


}

?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <!-- <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" /> -->
    <style type="text/css">
        h1{
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }
    h2{
      color: red;
      text-align: center;
    }
    </style>
 </head>
 <body>
 <?php include('master.php') ?>
<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Manage Balance</h4>
            
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 50px;">ID<br></th>
                                                        <th scope="col">Account Name</th>

                                                        <th scope="col"><br></th>

                                                        <th scope="col">Balance</th>
                                                        <th scope="col">Balance<br></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                               
                                                <?php
                                                    // For transactions in Home Page(index page)
                                                    $query_for_transactions = "SELECT * FROM balance ORDER BY Time DESC";
                                                    $transaction_result = mysqli_query($conn,$query_for_transactions);
                                                    $no_of_transaction = mysqli_num_rows($transaction_result);

                                                    while($row = mysqli_fetch_array($transaction_result)) {
                                                        $to_ID = $row['ID'];
                                                        $query_for_ben_name = "SELECT Name FROM user_db WHERE ID='$to_ID';";
                                                        $result_ben_name = mysqli_query($conn, $query_for_ben_name);
                                                        $ben_name = mysqli_fetch_array($result_ben_name)[0];
                                                       echo 
                                                       '<tr>          
                                                       <form action="" method="post">                                       
                                                            <td style="text-align:center">
                                                                <div class="avatar-xs" style="background-color: white;" >
                                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary" style="background-color: white;">
                                                                    <input name="tid" type="text"  style="width: 10px; background-color: white;" readonly="readonly" value='.$row['ID'].' />
                                                                        
                                                                    </span>&nbsp;
                                                                </div>
                                                            </td>
                                                            <td style="text-align:center">
                                                                <h3 class="font-size-15 mb-0">'.$ben_name.' </h3>
                                                            </td>
                                                            <td><br></td>
                                                            <td style="text-align:center"> <input type="number" name="amount" style="width: 60px; border: solid; border-radius: 6px" value='.$row['Amount'].' /></td>
                                                            <td style="text-align:center"><button type="submit" name="btn-send" class="btn btn-outline-success btn-sm">Update Balance</button></form>
                                                            <div class="col-sm-4"><br></td>
                                                            
                                                    </tr>';
                                                   } 
                                                   
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </body>
    </html>