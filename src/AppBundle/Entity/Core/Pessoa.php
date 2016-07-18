<?php


namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Util\Enum;

/**
 * Pessoa
 *
 * @ORM\Entity
 * @ORM\Table(name="pessoa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Core\PessoaRepository")
 *
 * @ExclusionPolicy("all")
 */
class Pessoa {
    
    /**
    * @var integer
    *
    * @ORM\Column(name="id_pessoa", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    * @Expose
    */
    protected $id;


    /**
     * @var Endereco
     *
     * @ORM\ManyToOne(targetEntity="Endereco", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_endereco", referencedColumnName="id_endereco", nullable=true)
     * })
     * @Expose
     */
    protected $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=30, nullable=true)
     * @Expose
     */
    protected $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=30, nullable=true)
     * @Expose
     */
    protected $rg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rg_data_emissao", type="date", nullable=true)
     * @Expose
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    protected $rgDataEmissao;

    /**
     * @var string
     *
     * @ORM\Column(name="rg_orgao_emissor", type="string", length=30, nullable=true)
     * @Expose
     */
    protected $rgOrgaoEmissor;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $password;
    
      /**
     * @var string
     *
     * @ORM\Column(name="renda", type="decimal", precision=10, scale=2, nullable=true)
     * @Expose
     */
    private $renda;

    /**
     * @var integer
     *
     *  1: Masculino
     *  2: Feminino
     *
     * @ORM\Column(name="sexo", type="integer", nullable=false, options={"default" = 1})
     * @Expose
     */
    protected $sexo;

    /**
     * @var integer
     *
     *  0: SOLTEIRO
     *  1: CASADO
     *  2: DIVORCIADO
     *  3: VIUVO
     *
     * @ORM\Column(name="estado_civil", type="integer", nullable=true, options={"default" = 0})
     * @Expose
     * @SerializedName("estadoCivil")
     */
    protected $estadoCivil;
    
    /**
     * @var integer
     *
     *  0: EMPREGADO
     *  1: EMPREGADOR
     *  2: AUTONOMO
     *  3: OUTROS
     *
     * @ORM\Column(name="categoria", type="integer", nullable=true, options={"default" = 0})
     */
    protected $categoria;
    
    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $empresa;
    
    /**
     * @var string
     *
     * @ORM\Column(name="profissao", type="string", length=255, nullable=false)
     */
    protected $profissao;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_de_nascimento", type="date", nullable=true)
     * @Expose
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    protected $dataDeNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=20, nullable=true)
     * @Expose
     */
    protected $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     * @Expose
     */
    protected $celular;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cadastro", type="datetime", nullable=false)
     * @Expose
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    private $cadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="atualizado", type="datetime", nullable=false)
     * @Expose
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    private $atualizado;

    public function __construct() {
        $this->cadastro = new \DateTime();
        $this->atualizado = new \DateTime();
    }

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
     * Set nome
     *
     * @param string $nome
     * @return Pessoa
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }
    
    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Pessoa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Pessoa
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set password
     *
     * @param string $password
     * @return Pessoa
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set sexo
     *
     * @param integer $sexo
     * @return Pessoa
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return integer
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set estadoCivil
     *
     * @param integer $estadoCivil
     * @return Pessoa
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return integer
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }
    
    /**
     * Set categoria
     *
     * @param integer $categoria
     * @return Pessoa
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return integer
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    
    /**
     * Set profissao
     *
     * @param string $profissao
     * @return Pessoa
     */
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;

        return $this;
    }

    /**
     * Get profissao
     *
     * @return string
     */
    public function getProfissao()
    {
        return $this->profissao;
    }
    
    /**
     * Set renda
     *
     * @param string $renda
     * @return Pessoa
     */
    public function setRenda($renda)
    {
        $this->renda = $renda;

        return $this;
    }

    /**
     * Get renda
     *
     * @return string 
     */
    public function getRenda()
    {
        return $this->renda;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return Pessoa
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Pessoa
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }
    
    /**
     * Set dataDeNascimento
     *
     * @param \DateTime $dataDeNascimento
     * @return Pessoa
     */
    public function setDataDeNascimento($dataDeNascimento)
    {
        $this->dataDeNascimento = $dataDeNascimento;

        return $this;
    }

    /**
     * Get dataDeNascimento
     *
     * @return \DateTime
     */
    public function getDataDeNascimento()
    {
        return $this->dataDeNascimento;
    }

    /**
     * Set cadastro
     *
     * @param \DateTime $cadastro
     * @return Pessoa
     */
    public function setCadastro($cadastro)
    {
        $this->cadastro = $cadastro;

        return $this;
    }

    /**
     * Get cadastro
     *
     * @return \DateTime
     */
    public function getCadastro()
    {
        return $this->cadastro;
    }

    /**
     * Set atualizado
     *
     * @param \DateTime $atualizado
     * @return Pessoa
     */
    public function setAtualizado($atualizado)
    {
        $this->atualizado = $atualizado;

        return $this;
    }

    /**
     * Get atualizado
     *
     * @return \DateTime
     */
    public function getAtualizado()
    {
        return $this->atualizado;
    }

    /**
     * Set endereco
     *
     * @param \App\Entity\Core\Endereco $endereco
     * @return Pessoa
     */
    public function setEndereco(\AppBundle\Entity\Core\Endereco $endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return \App\Entity\Core\Endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     * @return Pessoa
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set Rg
     *
     * @param string $rg
     * @return Pessoa
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get Rg
     *
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set RgDataEmissao
     *
     * @param \DateTime $rgDataEmissao
     * @return Pessoa
     */
    public function setRgDataEmissao($rgDataEmissao)
    {
        $this->rgDataEmissao = $rgDataEmissao;

        return $this;
    }

    /**
     * Get RgDataEmissao
     *
     * @return \DateTime
     */
    public function getRgDataEmissao()
    {
        return $this->RgDataEmissao;
    }

    /**
     * Set rgOrgaoEmissor
     *
     * @param string $rgOrgaoEmissor
     * @return Pessoa
     */
    public function setRgOrgaoEmissor($rgOrgaoEmissor)
    {
        $this->rgOrgaoEmissor = $rgOrgaoEmissor;

        return $this;
    }

    /**
     * Get rgOrgaoEmissor
     *
     * @return string
     */
    public function getRgOrgaoEmissor()
    {
        return $this->rgOrgaoEmissor;
    }
    
    
}
