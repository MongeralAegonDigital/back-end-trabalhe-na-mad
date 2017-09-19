<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An Address.
 * @ORM\Embeddable()
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class Address {
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $route;
    
    /**
     * @ORM\Column(type="string", length=32)
     * @var string
     */
    private $number;
    
    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     * @var string
     */
    private $complement;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    private $neighborhood;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    private $city;
    
    /**
     * @ORM\Column(type="string", length=2)
     * @var string
     */
    private $state;
    
    /**
     * @ORM\Column(type="string", length=9)
     * @var string
     */
    private $zipcode;
    
    /**
     * Constructs a new Address.
     */
    public function __construct() {
        
    }
    
    /**
     * Defines the route.
     * @param string $route
     * @return \AppBundle\Entity\Address
     */
    public function setRoute($route) {
        $this->route = $route;
        return $this;
    }
    
    /**
     * Returns the route.
     * @return string
     */
    public function getRoute() {
        return $this->route;
    }
    
    /**
     * Defines the number.
     * @param string $number
     * @return \AppBundle\Entity\Address
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
     * Defines the complement.
     * @param string $complement
     * @return \AppBundle\Entity\Address
     */
    public function setComplement($complement) {
        $this->complement = $complement;
        return $this;
    }

    /**
     * Returns the complement.
     * @return string
     */
    public function getComplement() {
        return $this->complement;
    }
    
    /**
     * Defines the neighborhood.
     * @param string $neighborhood
     * @return \AppBundle\Entity\Address
     */
    public function setNeighborhood($neighborhood) {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    /**
     * Returns the neighborhood.
     * @return type
     */
    public function getNeighborhood() {
        return $this->neighborhood;
    }
    
    /**
     * Defines the city.
     * @param string $city
     * @return \AppBundle\Entity\Address
     */
    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    /**
     * Returns the city.
     * @return string
     */
    public function getCity() {
        return $this->city;
    }
    
    /**
     * Defines the state.
     * @param string $state
     * @return \AppBundle\Entity\Address
     */
    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    /**
     * Returns the state.
     * @return string
     */
    public function getState() {
        return $this->state;
    }
    
    /**
     * Defines the zipcode.
     * @param string $zipcode
     * @return \AppBundle\Entity\Address
     */
    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * Returns the zipcode.
     * @return string
     */
    public function getZipcode() {
        return $this->zipcode;
    }
    
}
