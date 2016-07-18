<?php

namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;

/**
 * Endereco
 *
 * @ORM\Entity
 * @ORM\Table(name="endereco")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Core\EnderecoRepository")
 * 
 * @ExclusionPolicy("all") 
 */
class Endereco {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_endereco", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="logradouro", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $logradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $bairro;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=10, nullable=true)
     * @Expose
     */
    protected $cep;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set logradouro
     *
     * @param string $logradouro
     * @return Endereco
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get logradouro
     *
     * @return string 
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Endereco
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     * @return Endereco
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     * @return Endereco
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string 
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Endereco
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     * @return Endereco
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string 
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return Endereco
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string 
     */
    public function getCep()
    {
        return $this->cep;
    }

    public function getEnderecoPorExtenso() {

        $endereco = $this->logradouro.', '.$this->numero;
        if($this->complemento != '') {
            $endereco .= ' - '.$this->complemento;
        }

        $endereco .= ' - '.$this->bairro . ' - '.$this->cidade.' - '.$this->estado;
        $endereco .= ' - '.$this->cep;

        return $endereco;
    }
    
}
