<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Professional Data.
 * @ORM\Embeddable()
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class Identity {
    
    /**
     * @ORM\Column(type="string", length=16)
     * @var string
     */
    private $number;
    
    /**
     * @ORM\Column(type="string", length=16)
     * @var string
     */
    private $agency;
    
    /**
     * @ORM\Column(type="date")
     * @JMS\SerializedName("issuedAt")
     * @var \DateTime
     */
    private $issuedAt;
    
    /**
     * Constructs a new ProfessionalInfo.
     */
    public function __construct() {
        
    }
    
    /**
     * Defines the number.
     * @param string $number
     * @return \AppBundle\Entity\Identity
     */
    public function setNumber($number) {
        $this->number = $number;
        return $this;
    }
    
    /**
     * Returns the number.
     * @return string
     */
    public function getNumber() {
        return $this->number;
    }
    
    /**
     * Defines the agency.
     * @param string $agency
     * @return \AppBundle\Entity\Identity
     */
    public function setAgency($agency) {
        $this->agency = $agency;
        return $this;
    }

    /**
     * Returns the agency.
     * @return string
     */
    public function getAgency() {
        return $this->agency;
    }
    
    /**
     * Defines the issued date.
     * @param \DateTime $issuedAt
     * @return \AppBundle\Entity\Identity
     */
    public function setIssuedAt(\DateTime $issuedAt = null) {
        $this->issuedAt = $issuedAt;
        return $this;
    }

    /**
     * Returns the issued date.
     * @return \DateTime
     */
    public function getIssuedAt() {
        return $this->issuedAt;
    }
    
}
