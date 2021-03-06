<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$address = $_POST['address'];
$quantity = $_POST['quantity'];
$book = $_POST['title_book'];
$author = $_POST['author'];

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $msg = "ok";
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;

    // Настройки вашей почты
    $mail->Host       = 'smtp.ukr.net'; // SMTP сервера GMAIL
    $mail->Username   = 'bookshop2311@ukr.net'; // Логин на почте
    $mail->Password   = 'qwe1qwe2qwe3'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('bookshop2311@ukr.net', 'Сергей Ларин'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('bookshop2311@ukr.net');


    // Прикрипление файлов к письму
    if (!empty($_FILES['myfile']['name'][0])) {
        for ($ct = 0; $ct < count($_FILES['myfile']['tmp_name']); $ct++) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['myfile']['name'][$ct]));
            $filename = $_FILES['myfile']['name'][$ct];
            if (move_uploaded_file($_FILES['myfile']['tmp_name'][$ct], $uploadfile)) {
                $mail->addAttachment($uploadfile, $filename);
            } else {
                $msg .= 'Неудалось прикрепить файл ' . $uploadfile;
            }
        }
    }

    // -----------------------
    // Само письмо
    // -----------------------
    $mail->isHTML(true);

    $mail->Subject = 'Заголовок письма';
    $mail->Body    = "Ф.И.О: $name <br> 
                      Адрес: $address <br>
                      Количество экземпляров: $quantity<br>
                      Книга: $book";


// Проверяем отравленность сообщения
    if ($mail->send()) {
        echo "$msg";
    } else {
        echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
    }

} catch (Exception $e) {
    echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
