<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
 
require 'assets/vendor/PHPMailer/src/Exception.php';
require 'assets/vendor/PHPMailer/src/PHPMailer.php';
require 'assets/vendor/PHPMailer/src/SMTP.php';
 
$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];
 
$mail = new PHPMailer(true);
 
try {                       
    $mail->SMTPDebug = 2;  
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    // email aktif yang sebelumnya di setting
    $mail->Username   = 'k.candraw07@gmail.com';
    // password yang sebelumnya di simpan
    $mail->Password   = 'Windows10';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;  
 
    $mail->setFrom('mail@gmail.com', 'e-Portfolio');
     $mail->addAddress($email); 
        $mail->isHTML(true);
        $mail->Subject = $judul;    
        $mail->Body = $pesan;
        $mail->send();
        header("location:index.php?alert=berhasil");
 
    }catch (Exception $e) {
    	header("location:index.php?alert=gagal"); 	
    }
 
?>