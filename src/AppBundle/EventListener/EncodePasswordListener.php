<?php

namespace AppBundle\EventListener;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Client;
use AppBundle\Util\Random;

/**
 * Encrypt the user password.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class EncodePasswordListener {
    
    /**
     * 
     * @var \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface 
     */
    private $encoder;
    
    /**
     * Constructs a new EncodePasswordListener.
     * @param \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface $encoder
     */
    public function __construct(PasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    /**
     * Event before insert.
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args) {
        $client = $args->getEntity();
        if (!($client instanceof Client)) {
            return;
        }
        $this->encodePassword($client);
    }
    
    /**
     * Event before update.
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args) {
        $client = $args->getEntity();
        if (!($client instanceof Client)) {
            return;
        }
        if ($client->getPassword() === null) {
            return;
        }
        $this->encodePassword($client);
    }
    
    /**
     * Encodes the password.
     * @param \AppBundle\Entity\Client $client
     */
    private function encodePassword(Client $client) {
        $salt = Random::generateSalt();
        $client->setSalt($salt);
        
        $passwordHash = $this->encoder->encodePassword(
            $client->getPassword(),
            $client->getSalt()
        );
        $client->setPasswordHash($passwordHash);
    }

}
