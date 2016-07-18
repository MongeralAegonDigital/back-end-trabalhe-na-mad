<?php

namespace AppBundle\Service\Util;

class MailService {

    protected $mailer;
    protected $templating;
    protected $from;

    public function __construct(\Swift_Mailer $mailer, \Symfony\Bundle\TwigBundle\TwigEngine $templating) {
            $this->mailer = $mailer;
            $this->templating = $templating;
            $this->from = array('teste@mongeral.com.br' => 'Iskola');
    }
    
    public function cadastro($pessoa) {

        $message = \Swift_Message::newInstance()
                ->setSubject('Novo Cadastro')
                ->setFrom($this->from)
                ->setTo($pessoa->getEmail())
                ->setContentType("text/html")
                ->setCharset('utf-8')
                ->setBody(
                        $this->templating->render(
                                'pessoa/cadastro.html.twig',
                                array(
                                        'pessoa' => $pessoa
                                )
                        )
                );

        $this->mailer->send($message);
   }
    
}
