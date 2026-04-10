# Sistema de Orçamento com Formspree - Shield Security

## Como funciona

### 1. Formspree (orcamento_formspree.html)
- Formulário completo com validação
- Envio direto para Formspree (sem backend)
- Email formatado automaticamente
- Funciona offline e online

### 2. Configuração do Formspree

#### Passo 1: Criar conta Formspree
1. Acesse: https://formspree.io/
2. Crie uma conta gratuita
3. Crie um novo formulário

#### Passo 2: Configurar endpoint
- Endpoint atual: `https://formspree.io/f/xdroyvaj`
- **IMPORTANTE**: Substitua `xdroyvaj` pelo seu endpoint real

#### Passo 3: Configurar email de destino
- No painel Formspree
- Vá para Settings -> Emails
- Adicione: `sites.personalizados.lcsp@gmail.com`

## Vantagens do Formspree

### Funciona Offline
- Teste local sem servidor
- Sem necessidade de PHP
- Sem configuração de SMTP

### Funciona Online
- Hospedagem qualquer
- Sem preocupação com backend
- Manutenção zero

### Seguro
- Proteção contra spam
- Validação automática
- Rate limiting

## Como usar

### 1. Teste Local
```bash
# Abra o arquivo no navegador
file:///c:/Users/lucas/OneDrive/Documentos/Portfólios%20sites/Primeiro%20site/orcamento_formspree.html
```

### 2. Configure o Endpoint
1. Abra `orcamento_formspree.html`
2. Procure por: `action="https://formspree.io/f/xdroyvaj"`
3. Substitua `xdroyvaj` pelo seu endpoint

### 3. Configure o Email
1. Acesse seu painel Formspree
2. Vá em Settings -> Emails
3. Adicione seu email

## Campos do Formulário

### Campos Obrigatórios
- Nome Completo
- E-mail
- Telefone
- Tipo de Cliente
- Serviços
- Urgência
- Mensagem

### Campos Opcionais
- Empresa
- Newsletter

## Personalização

### Alterar Email Destino
- Configure no painel Formspree
- Não precisa alterar o código

### Alterar Design
- Edite o CSS no arquivo HTML
- Mantenha a estrutura do formulário

### Adicionar Campos
1. Adicione ao HTML
2. Formspree captura automaticamente

## Comparação: PHP vs Formspree

| Característica | PHP | Formspree |
|---------------|------|-----------|
| Servidor | Requer PHP | Funciona em qualquer lugar |
| Configuração | SMTP necessário | Zero configuração |
| Manutenção | Requer atualizações | Manutenção zero |
| Custo | Gratuito (com servidor) | Plano gratuito disponível |
| Segurança | Sua responsabilidade | Gerenciada pelo Formspree |

## Recomendação

### Para Desenvolvimento
Use `orcamento_formspree.html` para testes locais

### Para Produção
- Opção 1: Formspree (simples)
- Opção 2: PHP (controle total)

## Alternativas ao Formspree

- **Netlify Forms** (se usar Netlify)
- **EmailJS** (frontend puro)
- **Getform** (similar ao Formspree)
- **FormKeep** (opção paga)

## Suporte

- Formspree: support@formspree.io
- Documentação: https://formspree.io/docs/
- Comunidade: GitHub discussions
