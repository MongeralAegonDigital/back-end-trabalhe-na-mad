<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professional Data.
 * @ORM\Embeddable()
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ProfessionalInfo {
    
    /**
     * @ORM\Column(type="string", length=10)
     * @var string
     */
    private $category;
    
    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     * @var string
     */
    private $company;
    
    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    private $profession;
    
    /**
     * @ORM\Column(type="float")
     * @var string
     */
    private $salary;
    
    /**
     * Constructs a new ProfessionalInfo.
     */
    public function __construct() {
        
    }
    
    /**
     * Defines the category.
     * @param string $category
     * @return \AppBundle\Entity\ProfessionalInfo
     */
    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }
    
    /**
     * Returns the category.
     * @return string
     */
    public function getCategory() {
        return $this->category;
    }
    
    /**
     * Defines the company.
     * @param string $company
     * @return \AppBundle\Entity\ProfessionalInfo
     */
    public function setCompany($company) {
        $this->company = $company;
        return $this;
    }

    /**
     * Retorns the company.
     * @return string
     */
    public function getCompany() {
        return $this->company;
    }
    
    /**
     * Defines the profession.
     * @param string $profession
     * @return \AppBundle\Entity\ProfessionalInfo
     */
    public function setProfession($profession) {
        $this->profession = $profession;
        return $this;
    }

    /**
     * Return the profession.
     * @return string
     */
    public function getProfession() {
        return $this->profession;
    }
    
    /**
     * Defines the salary.
     * @param float $salary
     * @return \AppBundle\Entity\ProfessionalInfo
     */
    public function setSalary($salary) {
        $this->salary = $salary;
        return $this;
    }

    /**
     * Returns the salary.
     * @return float
     */
    public function getSalary() {
        return $this->salary;
    }
    
}
