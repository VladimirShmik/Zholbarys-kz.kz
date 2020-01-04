<?php

if( $_POST ){
	require 'phpmailer/PHPMailerAutoload.php';


$item = strip_tags(htmlspecialchars($_POST['item']));
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$city = strip_tags(htmlspecialchars($_POST['city']));
$message = strip_tags(htmlspecialchars($_POST['message']));


	$mail = new PHPMailer;

	$mail->isSMTP();

	$mail->Host = 'smtp.mail.ru';
	$mail->SMTPAuth = true;
	$mail->Username = 'no-reply@zholbarys-kz.kz'; // логин от вашей почты
	$mail->Password = '&q9R7rAStwtJ'; // пароль от почтового ящика
	$mail->SMTPSecure = 'ssl';
	$mail->Port = '465';

	$mail->CharSet = 'UTF-8';
	$mail->From = 'no-reply@zholbarys-kz.kz'; // адрес почты, с которой идет отправка
	$mail->FromName = $name; // имя отправителя
	$mail->addReplyTo($email_address, $name); // кому ответить
	
	$mail->addAddress('ksuwa88883@mail.ru', 'Жолбарыс Казахстан');

	$mail->Subject = "Заполнена форма заявки:  $email_address";
	$mail->Body = "Вы получили новое сообщение из контактной формы вашего сайта.\n\n"."Детали:\n\nТовар: $item\n\nИмя: $name\n\nEmail: $email_address\n\nТелефон: $phone\n\nГород: $city\n\nСообщение:\n$message";

	// $mail->SMTPDebug = 1;

	if( $mail->send() ){
		$answer = '1';
	}else{
		$answer = '0';
		/*echo 'Письмо не может быть отправлено. ';
		echo 'Ошибка: ' . $mail->ErrorInfo;*/
	}
	
	die( $answer );
}

       
?>
