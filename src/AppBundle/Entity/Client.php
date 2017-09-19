<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * A Client.
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ClientRepository")
 * @ORM\Table(name="clients")
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class Client {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;
    
    /**
     * @ORM\Embedded(class="\AppBundle\Entity\Address")
     * @var \AppBundle\Entity\Address
     */
    private $address;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     * @var \DateTime
     */
    private $birthday;
    
    /**
     * @ORM\Column(type="string", length=14, unique=true)
     * @var string
     */
    private $cpf;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=10)
     * @var string
     */
    private $gender;
    
    /**
     * @ORM\Embedded(class="\AppBundle\Entity\Identity")
     * @var \AppBundle\Entity\Identity
     */
    private $identity;
    
    /**
     * @ORM\Column(type="string", length=16)
     * @JMS\SerializedName("maritalStatus")
     * @var string
     */
    private $maritalStatus;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    private $name;
    
    /**
     * Plain password.
     * @JMS\Exclude()
     * @var string|null 
     */
    private $password;
    
    /**
     * @ORM\Column(type="string")
     * @JMS\Exclude()
     * @var string 
     */
    private $passwordHash;
    
    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     * @var string
     */
    private $phone;
    
    /**
     * @ORM\Embedded(class="\AppBundle\Entity\ProfessionalInfo")
     * @JMS\SerializedName("professionalInfo")
     * @var \AppBundle\Entity\ProfessionalInfo
     */
    private $professionalInfo;
    
    /**
     * @ORM\Column(type="string", length=40)
     * @JMS\Exclude()
     * @var string
     */
    private $salt;
    
    /**
     * Builds a new Client.
     */
    public function __construct() {
        $this->address = new Address();
        $this->identity = new Identity();
        $this->professionalInfo = new ProfessionalInfo();
    }
    
    /**
     * Defines the id.
     * @param int $id
     * @return \AppBundle\Entity\Client
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Returns the id.
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Defines the address.
     * @param \AppBundle\Entity\Address $address
     * @return \AppBundle\Entity\Client
     */
    public function setAddress(Address $address) {
        $this->address = $address;
        return $this;
    }
    
    /**
     * Returns the address.
     * @return \AppBundle\Entity\Address
     */
    public function getAddress() {
        return $this->address;
    }
    
    /**
     * Defines the birthday.
     * @param \DateTime $birthday
     * @return \AppBundle\Entity\Client
     */
    public function setBirthday(\DateTime $birthday = null) {
        $this->birthday = $birthday;
        return $this;
    }
        
    /**
     * Returns the birthday.
     * @return \DateTime
     */
    public function getBirthday() {
        return $this->birthday;
    }
    
    /**
     * Defines the CPF.
     * @param string $cpf
     * @return \AppBundle\Entity\Client
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }
    
    /**
     * Returns the CPF.
     * @return string
     */
    public function getCpf() {
        return $this->cpf;
    }
    
    /**
     * Defines the email.
     * @param string $email
     * @return \AppBundle\Entity\Client
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    
    /**
     * Returns the email.
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }
    
    /**
     * Defines the gender.
     * @param string $gender
     * @return \AppBundle\Entity\Client
     */
    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }
    
    /**
     * Returns the gender.
     * @return string
     */
    public function getGender() {
        return $this->gender;
    }
    
    /**
     * Defines the identity.
     * @param \AppBundle\Entity\Identity $identity
     * @return \AppBundle\Entity\Client
     */
    public function setIdentity(Identity $identity) {
        $this->identity = $identity;
        return $this;
    }
    
    /**
     * Returns the identity.
     * @return \AppBundle\Entity\Identity
     */
    public function getIdentity() {
        return $this->identity;
    }
    
    /**
     * Defines the marital status.
     * @param string $maritalStatus
     * @return \AppBundle\Entity\Client
     */
    public function setMaritalStatus($maritalStatus) {
        $this->maritalStatus = $maritalStatus;
        return $this;
    }
    
    /**
     * Returns the marital status.
     * @return string
     */
    public function getMaritalStatus() {
        return $this->maritalStatus;
    }
    
    /**
     * Defines the name.
     * @param string $name
     * @return \AppBundle\Entity\Client
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the name.
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * Defines the password.
     * @param string $password
     * @return \AppBundle\Entity\Client
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }
    
    /**
     * Returns the password.
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * Defines the password-hash.
     * @param string $passwordHash
     * @return \AppBundle\Entity\Client
     */
    public function setPasswordHash($passwordHash) {
        $this->passwordHash = $passwordHash;
        return $this;
    }

    /**
     * Returns the password-hash.
     * @return string
     */
    public function getPasswordHash() {
        return $this->passwordHash;
    }
        
    /**
     * Defines the phone number.
     * @param string $phone
     * @return \AppBundle\Entity\Client
     */
    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }
    
    /**
     * Returns the phone number.
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }
    
    /**
     * Defines the professional info.
     * @param \AppBundle\Entity\ProfessionalInfo $professionalInfo
     * @return \AppBundle\Entity\Client
     */
    public function setProfessionalInfo(ProfessionalInfo $professionalInfo) {
        $this->professionalInfo = $professionalInfo;
        return $this;
    }
    
    /**
     * Returns the professional info.
     * @return \AppBundle\Entity\ProfessionalInfo
     */
    public function getProfessionalInfo() {
        return $this->professionalInfo;
    }
    
    /**
     * Defines the salt.
     * @param string $salt
     * @return \AppBundle\Entity\Client
     */
    public function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }
    
    /**
     * Returns the salt.
     * @return string
     */
    public function getSalt() {
        return $this->salt;
    }
    
}
