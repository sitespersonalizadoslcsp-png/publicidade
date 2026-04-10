<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Configurações de email
$to_email = 'sites.personalizados.lcsp@gmail.com'; // Email para receber os orçamentos
$subject = 'Nova Solicitação de Orçamento - Shield Security';

// Função para limpar e validar dados
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Verificar se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obter e limpar os dados do formulário
    $nome = clean_input($_POST['nome'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $telefone = clean_input($_POST['telefone'] ?? '');
    $empresa = clean_input($_POST['empresa'] ?? '');
    $tipo = clean_input($_POST['tipo'] ?? '');
    $mensagem = clean_input($_POST['mensagem'] ?? '');
    $urgencia = clean_input($_POST['urgencia'] ?? '');
    $newsletter = isset($_POST['newsletter']) ? 'Sim' : 'Não';
    
    // Obter serviços selecionados
    $servicos = isset($_POST['servicos']) ? $_POST['servicos'] : [];
    $servicos_text = implode(', ', $servicos);
    
    // Validação básica
    $errors = [];
    
    if (empty($nome)) {
        $errors[] = 'Nome é obrigatório';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email inválido';
    }
    
    if (empty($telefone)) {
        $errors[] = 'Telefone é obrigatório';
    }
    
    if (empty($tipo)) {
        $errors[] = 'Tipo de cliente é obrigatório';
    }
    
    if (empty($servicos)) {
        $errors[] = 'Selecione pelo menos um serviço';
    }
    
    if (empty($urgencia)) {
        $errors[] = 'Nível de urgência é obrigatório';
    }
    
    if (empty($mensagem) || strlen($mensagem) < 20) {
        $errors[] = 'Mensagem muito curta (mínimo 20 caracteres)';
    }
    
    // Se houver erros, retornar
    if (!empty($errors)) {
        echo json_encode([
            'success' => false,
            'message' => 'Por favor, corrija os erros',
            'errors' => $errors
        ]);
        exit;
    }
    
    // Criar o corpo do email
    $email_body = "
    <html>
    <head>
        <title>Nova Solicitação de Orçamento</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
            .container { max-width: 600px; margin: 0 auto; background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
            .header { background: linear-gradient(135deg, #00ff88, #00ff41); color: #0a1929; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .header h1 { margin: 0; font-size: 24px; }
            .content { padding: 20px 0; }
            .field { margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
            .field-label { font-weight: bold; color: #333; margin-bottom: 5px; }
            .field-value { color: #666; }
            .urgency-high { color: #e74c3c; font-weight: bold; }
            .urgency-medium { color: #f39c12; font-weight: bold; }
            .urgency-low { color: #27ae60; font-weight: bold; }
            .footer { text-align: center; padding-top: 20px; color: #999; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Shield Security</h1>
                <p>Nova Solicitação de Orçamento</p>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='field-label'>Nome Completo:</div>
                    <div class='field-value'>$nome</div>
                </div>
                <div class='field'>
                    <div class='field-label'>Email:</div>
                    <div class='field-value'>$email</div>
                </div>
                <div class='field'>
                    <div class='field-label'>Telefone:</div>
                    <div class='field-value'>$telefone</div>
                </div>";
    
    if (!empty($empresa)) {
        $email_body .= "
                <div class='field'>
                    <div class='field-label'>Empresa:</div>
                    <div class='field-value'>$empresa</div>
                </div>";
    }
    
    $urgency_class = '';
    switch($urgencia) {
        case 'alta':
            $urgency_class = 'urgency-high';
            break;
        case 'media':
            $urgency_class = 'urgency-medium';
            break;
        case 'baixa':
            $urgency_class = 'urgency-low';
            break;
    }
    
    $email_body .= "
                <div class='field'>
                    <div class='field-label'>Tipo de Cliente:</div>
                    <div class='field-value'>" . ucfirst($tipo) . "</div>
                </div>
                <div class='field'>
                    <div class='field-label'>Serviços Solicitados:</div>
                    <div class='field-value'>$servicos_text</div>
                </div>
                <div class='field'>
                    <div class='field-label'>Nível de Urgência:</div>
                    <div class='field-value $urgency_class'>" . ucfirst($urgencia) . "</div>
                </div>
                <div class='field'>
                    <div class='field-label'>Mensagem:</div>
                    <div class='field-value'>$mensagem</div>
                </div>
                <div class='field'>
                    <div class='field-label'>Deseja receber novidades:</div>
                    <div class='field-value'>$newsletter</div>
                </div>
                <div class='field'>
                    <div class='field-label'>Data da Solicitação:</div>
                    <div class='field-value'>" . date('d/m/Y H:i:s') . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>Esta mensagem foi gerada automaticamente pelo site Shield Security</p>
            </div>
        </div>
    </body>
    </html>";
    
    // Headers do email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $nome . ' <' . $email . '>' . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";
    
    // Tentar enviar o email
    if (mail($to_email, $subject, $email_body, $headers)) {
        
        // Salvar em arquivo de log (backup)
        $log_entry = date('Y-m-d H:i:s') . " - " . $nome . " (" . $email . ") - " . $tipo . "\n";
        file_put_contents('orcamentos_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
        
        // Resposta de sucesso
        echo json_encode([
            'success' => true,
            'message' => 'Solicitação de orçamento enviada com sucesso! Entraremos em contato em até 24 horas.'
        ]);
        
    } else {
        // Erro ao enviar email
        echo json_encode([
            'success' => false,
            'message' => 'Erro ao enviar a solicitação. Por favor, tente novamente mais tarde.'
        ]);
    }
    
} else {
    // Método não permitido
    echo json_encode([
        'success' => false,
        'message' => 'Método não permitido'
    ]);
}
?>
