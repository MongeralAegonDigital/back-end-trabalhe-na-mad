<p>
    Olá prezado(a),
    <br>
    <br>
    Recebemos uma solicitação para redefinir a senha associada a este endereço de e-mail.
    Se você fez essa solicitação, por favor clique no botão abaixo para criar uma nova senha no site {{ Config::get('info.site_link') }}:
    <br>
    <br>
    Link para cadastrar nova senha:
    <br>
    <br>
    <a style="color:#fff;text-decoration: none;padding:5px;background: #3987CC" href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> Nova senha</a>
<p>Se você recebeu este e-mail por engano simplesmente ignorar esta mensagem.</p>
<p>Nenhuma outra ação é exigido de você. Sua conta permanecerá segura.</p>
<p>
    Para Maiores Informações entre em contato conosco:
    <br>
    <strong>Email:</strong> {{Config::get('info.contato_email')}}
    <br>
    <strong> Site:</strong>{{Config::get('info.site_link')}}
    <br>
    {{Config::get('info.site_title')}}
</p>


<small>Nota: Este endereço de e-mail foi enviado automaticamente, por favor, não responda a ele.</small>

</p>
