<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{
  public function __construct(){
    log_message('Debug', 'PHPMailer class is loaded.');
    $this->_ci = &get_instance();
    $this->_ci->load->database();
  }

  public function get_data($param){
    $query = $this->_ci->db->query("SELECT a.VALUE FROM TB_PENGATURAN a WHERE a.KEY = '$param'");
    return $query->row()->VALUE;
  }

  public function send($data){
    // Include PHPMailer library files
    require_once APPPATH.'third_party/PHPMailer/Exception.php';
    require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
    require_once APPPATH.'third_party/PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    // SMTP configuration
    // $mail->isSMTP();
    $mail->SMTPDebug  = FALSE;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    $mail->Host       = $this->get_data("EM_HOST");
    $mail->Username   = $this->get_data("EM_USERNAME");
    $mail->Password   = $this->get_data("EM_PASSWORD");

    $mail->setFrom('noreply@aweddy.com','AWeddy - A Wedding Day');
    $mail->addReplyTo('noreply@aweddy.com','AWeddy - A Wedding Day');

    // Add a recipient
    $mail->addAddress($data['to']);

    // Email subject
    $mail->Subject = $data['subject'];

    // Set email format to HTML
    $mail->isHTML(true);
    // Email body content
    $mail->Body = $data['message'];

    // Send email
    if (!$mail->send()) {
			echo 'Message could not be sent. <br>';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			echo '<br>Contact ADMIN ';
			die();
    } else {
      return true;
    }

  }

}
?>
