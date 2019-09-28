<?php
 $name = $_POST['name'];
 $subject = $_POST['subject'];
 $email = $_POST['email'];
 $message = $_POST['message'];
 require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'XXXXXXXX@gmail.com	';          // SMTP username
$mail->Password = 'XXXXXXXX'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom($email, $subject);
$mail->addReplyTo($email, $subject);
$mail->addAddress($email);   // Add a recipient


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" style="border:solid 1px #cccccc" width="640">
	<tbody>
		<tr>
			<td colspan="2" style="padding:20px 10px">
			<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="600">
				<tbody>
					<tr>
						<td style="font-family:verdana;font-size:13px;line-height:24px">
						<p>Hi, '.$name.'</p>

						</td>
					</tr>
					<tr>
						<td style="font-family:verdana;font-size:13px;line-height:24px">
						<p>Message: '.$message.'</p><p style="margin-bottom:10px">Thanks for contact</p><p style="margin-bottom:10px">Thanks<br>Ajay kr gupta</p>

						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
	</table>';
$mail->Subject = $subject;
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location: success.html");
}

?>