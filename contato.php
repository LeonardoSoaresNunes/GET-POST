<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        

        // Foma mais simples de enviar email em php

       // $nome = $_GET["nome"];
       // $email = $_GET["email"];
       // $telefone = $_GET["num"];
       // $mensagem = $_GET["mensagem "];



      // mail('leonardoeaf2009@hotmail.com', $nome, $email,$num,$mensagem, "From: leonardoeaf2009@hotmail.com");
      // echo "Dados enviados com sucesso";       
// Outro tipo de envio de email em php
		$nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["num"];
        $mensagem = $_POST["mensagem "];
	

        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "leonardoeaf2009@hotmail.con");
        $subject = "Mensagem de Contato";
        $to = new SendGrid\Email(null, "leonardoeaf2009@hotmial.com");
        $content = new SendGrid\Content("text/html", "Olá, Leonardo Soares<br><br>Mensagem de Contato<br><br> Nome:$nome <br>Eemail:$email<br>Telefon:$telefone<br>Mensagem:$mensagem<br>");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SENDGRID_API_KEY';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        //echo $response->statusCode();
        //echo $response->headers();
        //echo $response->body();
        echo "Mensagem enviada com sucesso";
        ?>
        
    </body>
</html>
