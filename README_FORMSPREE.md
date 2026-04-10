# Orçamento com Formspree - Shield Security

## Como funciona

O Formspree é um serviço que permite receber formulários diretamente no seu email sem precisar de backend PHP.

## Configuração necessária

### 1. Criar conta Formspree
1. Acesse [formspree.io](https://formspree.io)
2. Crie uma conta gratuita
3. Crie um novo formulário

### 2. Configurar o formulário
No arquivo `orcamento_formspree.html`, altere a linha:

```html
<form action="https://formspree.io/f/xyz123" method="POST">
```

Substitua `xyz123` pelo seu ID do Formspree.

### 3. Configurar email de destino
No painel do Formspree, configure o email `sites.personalizados.lcsp@gmail.com` para receber as solicitações.

## Vantagens

- **Funciona offline** - Não precisa de servidor PHP
- **Funciona online** - Sem configuração de SMTP
- **Grátis** - Plano gratuito com 50 submissões/mês
- **Fácil** - Sem programação backend
- **Seguro** - Proteção contra spam

## Como usar

1. **Configurar Formspree** (2 minutos)
2. **Atualizar o action** do formulário
3. **Testar** - Funciona imediatamente

## Teste rápido

1. Abra `orcamento_formspree.html` no navegador
2. Preencha o formulário
3. Clique em "Enviar Solicitação"
4. Verifique o email configurado

## Formato do email recebido

Você receberá um email com todos os campos do formulário:

- Nome Completo
- Email
- Telefone
- Empresa
- Tipo de Cliente
- Serviços Selecionados
- Urgência
- Mensagem
- Newsletter
- Termos

## Alternativas

Se precisar de mais funcionalidades:
- **Netlify Forms** - Se usar Netlify
- **EmailJS** - Frontend puro
- **Getform** - Similar ao Formspree
