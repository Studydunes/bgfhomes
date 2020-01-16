<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
include 'email/src/POP3.php';
include 'email/src/OAuth.php';
include 'email/src/Exception.php';
include 'email/src/SMTP.php';
include 'email/src/PHPMailer.php';
class Email{
    var $mail;
    public function __construct(){
        global $smtpSetting;
        $this->mail = new PHPMailer\PHPMailer\PHPMailer();

        $this->mail->IsSMTP(); // enable SMTP
        $this->mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $this->mail->SMTPAuth = true; // authentication enabled
        // $this->mail->SMTPSecure = $smtpSetting['type']; // secure transfer enabled REQUIRED for Gmail
        $this->mail->Host = $smtpSetting['smtp'];
        $this->mail->Port =  $smtpSetting['port'];
        $this->mail->IsHTML(true);
        $this->mail->Username = $smtpSetting['username'];
        $this->mail->Password = $smtpSetting['password'];
        $this->mail->SetFrom($smtpSetting['from'],$smtpSetting['from_name']);
        $this->mail->Subject = "Bgfhomes";
        //$this->mail->AddAddress("visitation@bgfhomes.com");
        //$this->mail->AddReplyTo("info@bgfhomes.com");
    }
    public function send(){
        if(!$this->mail->Send()) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }
}
?>