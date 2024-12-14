<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['contact'];
$subject = $_POST['subject'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
        $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         //Enable verbose debug output
        $mail->isSMTP();                                              //Send using SMTP
        $mail->Host       = 'smtp.zoho.in';                          //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                                    //SMTP user
        $mail->Password   = '';                                   //SMTP password
        $mail->SMTPSecure = 'ssl';                               //Enable implicit TLS encryption
        $mail->Port       = 465;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPOptions=array(
                'ssl'=>array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                    'allow_self_signed'=>true
                    )
                );
        $mail->setFrom('prdigital224@gmail.com', 'PR ASSOCIATES');
        $mail->addAddress('support@prassociate.in');              
        $mail->isHTML(true);              
        $sub='<div>
            <table width="90%" border="2" >
                <tr>
                    <th>Name :</th>
                    <td>'.$name.'</td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td>'.$email.'</td>
                </tr>
                <tr>
                    <th>Contact :</th>
                    <td>'.$contact.'</td>
                </tr>
                <tr>
                    <th>Message :</th>
                    <td>'.$message.'</td>
                </tr>
            </table>
        </div>';           //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $sub;
        // $mail->AltBody = $message;
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>
