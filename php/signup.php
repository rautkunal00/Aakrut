<?php 

include('database_connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$output = "";
$UserName="";
$EmailId="";
$UserMobile="";

if( empty($_POST["User_Name"]) || empty($_POST["Email_Id"]) || empty($_POST["User_Mobile"]) ) {
    $output = false;
    echo $output;
}
else{

    if(isset($_POST['User_Name']))
    {$UserName=$_POST['User_Name'];}
    if(isset($_POST['Email_Id']))
    {$EmailId=$_POST['Email_Id'];}
    if(isset($_POST['User_Mobile']))
    {$UserMobile=$_POST['User_Mobile'];}


    $query = "SELECT * FROM `user_info` WHERE Email_Id='$EmailId'";
    $result = $connect->query($query);
    $rowcount= $result->rowCount();
    if($rowcount > 0){
        echo 1;
    }else{
        $query = "SELECT * FROM `user_info` WHERE 1";
        $result = $connect->query($query);
        $rowcount= $result->rowCount();
        $rowcount++;
        $query = "INSERT INTO `user_info` (User_Id,User_Name,Email_Id, Mobile_No) VALUES ('".$rowcount."','".$UserName."','".$EmailId."','". $UserMobile."')";
        sendMail($EmailId,$UserName);
        $statement = $connect->prepare($query);
        $statement->execute();
        // echo $connect->query($query);
    }
    
    $connect=null;
}




  function sendMail($EmailId,$UserName){
        //OTP genration
        // Function to generate OTP 
        function generateNumericOTP($n) { 

            $generator = "1357902468"; 
            $result = ""; 
            
            for ($i = 1; $i <= $n; $i++) { 
                $result .= substr($generator, (rand()%(strlen($generator))), 1); 
            } 
            return $result; 
        } 
        $n = 4; 


        $mail = new PHPMailer(true);

        try {

            $otp = generateNumericOTP($n);

            //store in coockie
            $cookie_name = "otp";
            setcookie($cookie_name, $otp, time() + 20, "/");
            // if(!isset($_COOKIE[$cookie_name])) {
            // echo "Cookie named '" . $cookie_name . "' is not set!";
            // } else {
            // echo "Cookie '" . $cookie_name . "' is set!<br>";
            // echo "Value is: " . $_COOKIE[$cookie_name]."<br>";
            // }

            //Server settings
            $mail->isSMTP();                                      
            $mail->SMTPAuth   = true;                         
            $mail->SMTPSecure = 'ssl';  
            $mail->Host       = 'smtp.gmail.com';              
            $mail->Port       = 465;
            $mail->isHTML(true);
            $mail->Username   = 'teamtech.init@gmail.com';
            $mail->Password   = 'Te@m_w1N';               

            //Recipients
            $mail->setFrom('teamtech.init@gmail.com', 'Mailer');
            $mail->addAddress($EmailId, $UserName);     

            // Content
            $mail->Subject = 'Email verification';
            $mail->Body    = 'This mail is genrated for email verification<br> Please enter following OTP for verification<br> <b>'.$otp.'<b>';

            $mail->send();
            $output = $otp;
            $output = $otp;
            echo $output;
        } catch (Exception $e) {
            $output= false;
            // $output[3]= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo $output;
        }
  }      
        




?>