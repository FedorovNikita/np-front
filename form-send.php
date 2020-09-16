<?php

require 'php/smtp-agent.php';

$subject = 'Новая запись на курс frontend';
$coder_subject = 'Спасибо за заявку';
//$to = 'arturvitt@yandex.ru';
$to = 'school@napoleonit.ru';

$name = $_POST['name']; // required
$email_from = $_POST['email']; // required
$phone = $_POST['phone']; // required
$bday = $_POST['bday'];
$job = $_POST['job'];
$social = $_POST['social'];
$target = $_POST['target'];
$email_message = "Новая запись.\n\n";

function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}

$email_message .= "Имя: ".clean_string($name)."\n";
$email_message .= "Телефон: ".clean_string($phone)."\n";
$email_message .= "Email: ".clean_string($email_from)."\n";
$email_message .= "Род деятельности: ".clean_string($job)."\n";
$email_message .= "Дата рождения: ".clean_string($bday)."\n";
$email_message .= "Социальная сеть: ".clean_string($social)."\n";
$email_message .= "Почему хочет на курс: ".clean_string($target)."\n";



// $coder_message = "Спасибо за заявку!\n
// В ближайшее время мы с тобой свяжемся и сообщим подробности мероприятия.\n
// Увидимся 30 ноября в 10:00 по адресу ул. Салавата Юлаева 17Г, СПА-Отель Мелиот.\nНе забудь взять с собой сменную обувь и ноутбук.\n
// ";

$coder_headers = "To: $email_from\r\n";
$coder_headers .= "Reply-To: school@napoleonit.ru\r\n";
// $coder_headers .= "From: CHEL_HACK <info@chelhack.ru>";
// $headers = "MIME-Version: 1.0\r\n";
// $headers .= "Content-type: text/html; charset=windows-1251\r\n";
$headers = "To: $to\r\n";
$headers .= "From: Заполненная форма (FRONTEND) <napoleoninfo@napoleonit.com>";
if($phone) {
MailSmtp($to, $subject, $email_message, $headers);
echo "success";
}

?>
