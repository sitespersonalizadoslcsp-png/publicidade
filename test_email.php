<?php
// Script de teste para verificar configuração de email
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Teste de Configuração de Email</h1>";

// Verificar se a função mail() existe
if (function_exists('mail')) {
    echo "<p style='color: green;'>Função mail() está disponível</p>";
} else {
    echo "<p style='color: red;'>ERRO: Função mail() não está disponível</p>";
    exit;
}

// Verificar configuração do sendmail
$sendmail_path = ini_get('sendmail_path');
echo "<p>Sendmail Path: " . ($sendmail_path ?: 'Não configurado') . "</p>";

// SMTP settings
$smtp_host = ini_get('SMTP');
$smtp_port = ini_get('smtp_port');
echo "<p>SMTP Host: " . ($smtp_host ?: 'Não configurado') . "</p>";
echo "<p>SMTP Port: " . ($smtp_port ?: 'Não configurado') . "</p>";

// Testar envio de email simples
$to = 'sites.personalizados.lcsp@gmail.com';
$subject = 'Teste de Email - Shield Security';
$message = 'Este é um email de teste para verificar se o sistema de email está funcionando.';
$headers = 'From: test@shieldsecurity.com' . "\r\n" .
           'Reply-To: test@shieldsecurity.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

echo "<h2>Testando envio de email...</h2>";

if (mail($to, $subject, $message, $headers)) {
    echo "<p style='color: green;'>SUCESSO: Email enviado para $to</p>";
    echo "<p>Verifique sua caixa de entrada (e spam) para confirmar.</p>";
} else {
    echo "<p style='color: red;'>ERRO: Falha ao enviar email</p>";
    
    // Mostrar último erro
    $error = error_get_last();
    if ($error) {
        echo "<p>Erro: " . $error['message'] . "</p>";
    }
    
    echo "<h3>Soluções possíveis:</h3>";
    echo "<ul>";
    echo "<li>Verifique se o servidor tem SMTP configurado</li>";
    echo "<li>Configure o sendmail_path no php.ini</li>";
    echo "<li>Use uma biblioteca como PHPMailer ou SendGrid</li>";
    echo "<li>Contrate um serviço de email SMTP</li>";
    echo "</ul>";
}

// Informações do PHP
echo "<h2>Informações do Sistema:</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Sistema Operacional: " . PHP_OS . "</p>";
echo "<p>Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "</p>";

// Verificar extensões necessárias
echo "<h2>Extensões PHP:</h2>";
$required_extensions = ['openssl', 'mbstring', 'json'];
foreach ($required_extensions as $ext) {
    $status = extension_loaded($ext) ? 'Disponível' : 'Não disponível';
    $color = extension_loaded($ext) ? 'green' : 'red';
    echo "<p style='color: $color;'>$ext: $status</p>";
}
?>
