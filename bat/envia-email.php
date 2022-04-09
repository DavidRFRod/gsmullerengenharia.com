<?php

  $name = utf8_encode($_POST['name']);
  $email = utf8_encode($_POST['email']);
  $subject = utf8_encode($_POST['subject']);
  $message = utf8_encode($_POST['message']);

  require 'PHPMailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;
  $mail->isSMTP();

  //Configurações do Servidor de e-mail
    $mail->Host = "smtp.zoho.com";
    $mail->Port = "587";
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = "contato@gsmullerengenharia.com"; // Gmail address which you want to use as SMTP server
    $mail->Password = "68G.muller"; // Gmail address Password


//Confirgurações da Mensagem

    $mail->setFrom($mail->Username, "Gustavo"); // Gmail address which you used as SMTP server
    $mail->addAddress("contato@gsmullerengenharia.com"); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = "$subject";
    $conteudo_email = "Você recebeu uma mensagem de $name ($email).
    <br><br>
    Assunto: $subject <br>
    Mensagem: 
    <br><br>
    $message";
    $mail->IsHTML(true);
    $mail->Body = $conteudo_email;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPDebug = SMTP::DEBUG_CLIENT;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;

    if ($mail->send()){
      echo "E-mail enviado com sucesso!";
      header("Location: index.html");
    }else{
      echo "Falha ao enviar o e-mail". $mail->ErrorInfo;
      header("Location: index.html");
    }

//     $mail->send();
//     $alert = '<div class="alert-success">
//                  <span>Message Sent! Thank you for contacting us.</span>
//                 </div>';
//   } catch (Exception $e){
//     $alert = '<div class="alert-error">
//                 <span>'.$e->getMessage().'</span>
//               </div>';
//  
//
?>
      