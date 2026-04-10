# Sistema de Orçamento - Shield Security

## Como funciona

### 1. Frontend (orcamento.html)
- Formulário completo com validação
- Envio via AJAX para o backend PHP
- Feedback visual em tempo real

### 2. Backend (send_orcamento.php)
- Recebe e valida os dados
- Envia email formatado em HTML
- Salva log das solicitações
- Retorna resposta JSON

### 3. Configurações (.htaccess)
- Habilita CORS para requisições AJAX
- Configura envio de email
- Protege arquivos sensíveis

## Configuração do Email

### Email de destino:
- **Padrão**: shieldsecurity@gmail.com
- **Para alterar**: Edite a linha `$to_email` no arquivo `send_orcamento.php`

### Servidor de email:
- Usa a função `mail()` do PHP
- Requer servidor configurado para envio de emails
- Alternativas: PHPMailer, SendGrid, AWS SES

## Arquivos criados

1. **send_orcamento.php** - Backend PHP
2. **.htaccess** - Configurações do servidor
3. **orcamentos_log.txt** - Log das solicitações (criado automaticamente)

## Teste

1. Preencha o formulário em `orcamento.html`
2. Clique em "Enviar Solicitação"
3. Verifique o email de destino
4. Confira o arquivo `orcamentos_log.txt`

## Requisitos do Servidor

- PHP 7.0 ou superior
- Função `mail()` habilitada
- Permissão de escrita para arquivos de log

## Solução de Problemas

### Email não chega:
1. Verifique a configuração do servidor SMTP
2. Confirme o email de destino
3. Verifique a pasta de spam

### Erro 500:
1. Verifique os logs de erro do PHP
2. Confirme as permissões dos arquivos
3. Teste o arquivo PHP diretamente

### CORS error:
1. Verifique o arquivo `.htaccess`
2. Confirme se o servidor Apache está ativo

## Personalização

### Alterar email de destino:
```php
$to_email = 'seu-email@dominio.com'; // Altere aqui
```

### Personalizar template:
Edite o HTML dentro da variável `$email_body` no arquivo `send_orcamento.php`

### Adicionar novos campos:
1. Adicione ao formulário HTML
2. Capture no JavaScript
3. Processe no backend PHP
