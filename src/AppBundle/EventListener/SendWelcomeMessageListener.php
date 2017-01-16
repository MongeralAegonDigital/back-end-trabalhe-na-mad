<?php

namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use AppBundle\Event\ClientEvent;
use AppBundle\Event\ClientEvents;
use AppBundle\Entity\Client;

/**
 * Sends an e-mail to client.
 *
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class SendWelcomeMessageListener implements EventSubscriberInterface {
    
    /**
     *
     * @var \Swift_Mailer 
     */
    private $mailer;
    
    /**
     *
     * @var \Twig_Environment 
     */
    private $twig;
    
    /**
     * 
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $twig
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig) {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }
    
    /**
     * 
     * @param \AppBundle\Event\ClientEvent $event
     */
    public function onCreate(ClientEvent $event) {
        $client = $event->getClient();
        $this->sendWelcomeMessage($client);
    }
    
    /**
     * Send e-mail.
     * @param \AppBundle\Entity\Client $client
     */
    private function sendWelcomeMessage(Client $client) {
        $message = \Swift_Message::newInstance()
            ->setSubject('Bem-vindo(a)!')
            ->setFrom('nilosoares1989@gmail.com', 'Nilo Soares')
            ->setTo($client->getEmail())
            ->setBody(
                $this->twig->render('Email/Client/welcome_message.html.twig', array(
                    'client' => $client,
                )),
                'text/html'
            );
        $this->mailer->send($message);
    }

    /**
     * 
     * @return array
     */
    public static function getSubscribedEvents() {
        return array(
            ClientEvents::CREATE_CLIENT => 'onCreate',
        );
    }

}
