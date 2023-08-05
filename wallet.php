<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
</head>
<body>
  <div>
  <nav>
            <ul>
                <li>
                    <a href="" class= "logo">
                        <img src="images/dashlogo.png" alt="">
                        <span class="nav-items">DashBoard</span>
                    </a>
                 </li>

                 <li><a href="">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                 </a></li>

                 <li><a href="profile.php">
                 <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                 </a></li>

                 <li><a href="wallet.php">
                 <i class="fas fa-wallet"></i>
                    <span class="nav-item">Wallet</span>
                 </a></li>
 
                 <li><a href="">
                 <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Analytics</span>
                 </a></li>

                 <li><a href="">
                 <i class="fas fa-tasks"></i>
                    <span class="nav-item">Tasks</span>
                 </a></li>

                 <li><a href="">
                 <i class="fas fa-cog"></i>
                    <span class="nav-item">Settings</span>
                 </a></li>

                 <li><a href="">
                 <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Help</span>
                    </a></li>

                 <li><a href="" class = "logout">
                 <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Logout</span>
                    </a></li>
            </ul>
        </nav>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class="wallet" method="POST">
      <h1 >Mpesa payment</h1>
      <div class="payment">
        <label for="phone">Enter Phone Number</label>
        <input type="phone" name="phone" id ="phone" required><br>
        
      </div>
      <div class="payment">
        <label for="amount">Enter amount</label>
        <input type="text" name="amount" id ="amount" required><br>
        
      </div>
      <div class="button">
      <button type="submit" >Pay</button>
      </div>
    </form>

    </div>
</body>
</html>
<?php
if(isset($_POST["submit"])){

    date_default_timezone_set('Africa/Nairobi');

    #access token
    $consumerKey = 'VFlwz1GWpIeEygAUrWNqLCOa2hIIClqX';
    $consumerSecret = 'SehOmAA3063QShz';

    #define the variables
    $businessShortCode = '174379';
    $passKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

    $PartyA = $_POST['phone'];
    $accountRef ='2255';
    $transActionDesc = 'Test Payment';
    $amount = $_POST['amount'];

    $timeStamp = date('YmdHis');

    $pass = base64_encode($businessShortCode.$passKey.$timeStamp);

    $headers = ['Content-Type:application/json; charset-utf8'];

    #mpesa end point urls
    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

    #callback url my callback from ngork
    $callBackUrl = 'https://8ea3-102-216-84-101.ngrok-free.app/sherehe/callback.php';

    $curl = curl_init($access_token_url);
    curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl,CURLOPT_HEADER, FALSE);
    curl_setopt($curl,CURLOPT_USERPWD, $consumerKey. ':'.$consumerSecret);
    $result = curl_exec($curl);
    $status = curl_exec($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $access_token = $result->access_token;
    curl_close($curl);

    $stkheader = ['Content-Type:application/json','Authorization:Bearer' .$access_token];

    #initiate the transaction

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $initiate_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);//setting custom header

    $curl_post_data = array(

        'BusinessShortCode' => $businessShortCode,
        'Password' => $pass,
        'Timestamp' => $timeStamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $timeStamp,
        'PartyB' => $businessShortCode,
        'PhoneNumber' => $PartyA,
        'CallBackURL' => $callBackUrl,
        'AccountReference' => $accountRef,
        'TransactionDesc' => $transActionDesc,
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);

    echo $curl_response;


}
?>