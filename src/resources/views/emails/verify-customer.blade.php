<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de E-mail</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .button { display: inline-block; padding: 10px 20px; background-color: #2d3748; color: #ffffff !important; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Olá, {{ $customer->name }}!</h2>
    <p>Obrigado por se cadastrar no BRFILMS. Para que você possa acessar sua conta, precisamos apenas que confirme seu endereço de e-mail.</p>
    
    <p>Clique no botão abaixo para ativar sua conta (este link é válido por 24 horas):</p>
    
    <p style="margin-top: 25px; margin-bottom: 25px;">
        <a href="{{ $verificationUrl }}" class="button">Confirmar Meu E-mail</a>
    </p>
    
    <p>Se você não fez esse cadastro, nenhuma ação é necessária.</p>
    <br>
    <p>Atenciosamente,<br>Equipe BRFILMS!</p>
</body>
</html>