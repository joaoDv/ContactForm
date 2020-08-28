<?php
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente = $_POST['name'];
$emailremetente = trim($_POST['email']);
$emaildestinatario = 'contato@contato.com.br';// Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web
$phone = $_POST['phone'];
$message = $_POST['message'];

/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '
<strong>Formulário de Contato</strong>
<p><b>Nome:</b> '.$nomeremetente.' <p>
<b>E-Mail:</b> '.$emailremetente.' <p>
<b>Telefone:</b> '.$phone.' <p>
<b>Mensagem:</b> '.$message.'</p>
<hr>';

// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n";
// remetente
$headers .= "Return-Path: $emaildestinatario \r\n";
// return-path
$envio = mail($emaildestinatario, $nomeremetente, $mensagemHTML, $headers);
if($envio)
echo "<script>location.href='index.html'</script>";// Página que será redirecionada
?>