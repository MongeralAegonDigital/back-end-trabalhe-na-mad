<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

use AppBundle\Util\Enum;
use AppBundle\Service\Util\Ferramentas;
use AppBundle\Service\Util\MailService;

use AppBundle\Entity\Core\Endereco;
use AppBundle\Entity\Core\Pessoa;

class PessoaService {
   /**
    * @var EntityManager
    */
   protected $em;

   /**
    * @var Ferramentas
    */
   protected $ferramentas;

   /**
    * @var Container
    */
   protected $container;
   
   /**
    * Método construtor que inicializa o EntityManager
    */
   public function __construct(EntityManager $entityManager, Container $container) {
           $this->em = $entityManager;
           $this->container = $container;
           $this->ferramentas = new Ferramentas();
   }
   
   public function cadastrar(Request $request) {

        $this->em->getConnection()->beginTransaction();
        try {

                $dataPessoa = $request->request->get('pessoa');

                $pessoa = $this->setDataPessoa($dataPessoa);

                $this->em->persist($pessoa);

                $this->em->flush();

                $this->em->getConnection()->commit();

                $this->container->get('util.mail')->cadastro($pessoa);


                return $pessoa;

        } catch (Exception $e) {
                $this->em->getConnection()->rollback();
                $this->em->close();

                throw $e;
        }
    }
    
    private function setDataPessoa($dataPessoa) {

            $dataNascimento = $this->ferramentas->converteInDateTime($dataPessoa['pessoa']['dataNascimento']);

            $rgDataEmissao = null;
            if(isset($dataPessoa['pessoa']['rgDataEmissao']) && $dataPessoa['pessoa']['rgDataEmissao'] != '') {
                    $rgDataEmissao = $this->ferramentas->converteInDateTime($dataPessoa['pessoa']['rgDataEmissao']);
            }

            $rg = isset($dataPessoa['pessoa']['rg']) ? $dataPessoa['pessoa']['rg'] : null;
            $rgOrgaoEmissor = isset($dataPessoa['pessoa']['rgOrgaoEmissor']) ? $dataPessoa['pessoa']['rgOrgaoEmissor'] : null;

            $telefone = isset($dataPessoa['pessoa']['telefone']) ? $dataPessoa['pessoa']['telefone'] : null;
            $celular = isset($dataPessoa['pessoa']['email']) ? $dataPessoa['pessoa']['celular'] : null;
            
            $pessoa = new Pessoa();

            $pessoa->setNome($dataPessoa['pessoa']['nome']);
            $pessoa->setCpf($dataPessoa['pessoa']['cpf']);
            $pessoa->setRg($rg);
            $pessoa->getRgDataEmissao($rgDataEmissao);
            $pessoa->setRgOrgaoEmissor($rgOrgaoEmissor);
            $pessoa->setSexo($dataPessoa['pessoa']['sexo']);
            $pessoa->setDataNascimento($dataNascimento);
            $pessoa->setEstadoCivil($dataPessoa['pessoa']['estadoCivil']);
            $pessoa->setTelefone($telefone);
            $pessoa->setCelular($celular);
            $pessoa->setEmail($dataPessoa['pessoa']['email']);
            $pessoa->setPessword($dataPessoa['pessoa']['password']);
            $pessoa->setRenda($dataPessoa['pessoa']['renda']);
            $pessoa->setCategoria($dataPessoa['pessoa']['categoria']);
            $pessoa->setEmpresa($dataPessoa['pessoa']['empresa']);
            $pessoa->setProfissao($dataPessoa['profissao']);
            $pessoa->setCadastro(new \DateTime());
            $pessoa->setAtualizado(new \DateTime());
            
            $endereco = new Endereco();

            $endereco->setEstado($dataPessoa['pessoa']['endereco']['estado']);
            $endereco->setCidade($dataPessoa['pessoa']['endereco']['cidade']);
            $endereco->setLogradouro($dataPessoa['pessoa']['endereco']['logradouro']);
            $endereco->setNumero($dataPessoa['pessoa']['endereco']['numero']);
            $endereco->setComplemento($dataPessoa['pessoa']['endereco']['complemento']);
            $endereco->setBairro($dataPessoa['pessoa']['endereco']['bairro']);
            $endereco->setCep($dataPessoa['pessoa']['endereco']['cep']);

            $pessoa->setEndereco($endereco);
            
            return $pessoa;
		
	}

}
