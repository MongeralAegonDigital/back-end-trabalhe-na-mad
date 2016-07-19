<?php

namespace AppBundle\Service\Util;


class Ferramentas {
    
    /**
    * @return \DateTime $obj_date
    */
   public function converteInDateTime($data) {

        $arr = explode(' ', $data);

        if(sizeof($arr)>1) {

                $arr_data = explode('/',$arr[0]);
                $str_data = $arr_data[2].'-'.$arr_data[1].'-'.$arr_data[0];

                $str_time = $arr[1].':00';

                $obj_data = new \DateTime($str_data.' '.$str_time);

        } else {
                $arr_data = explode('/',$data);
                $str_data = $arr_data[2].'-'.$arr_data[1].'-'.$arr_data[0];
                $obj_data = new \DateTime($str_data);   
        }


        return $obj_data;
     }

     public function limpaValor($valor) {
             $novo_valor = trim(str_replace('R$','',str_replace(',','.',str_replace('.','',$valor))));
             return $novo_valor;
     }

     public function limpaCpf($cnpjCpf) {
             $novo_valor = str_replace('.','',str_replace('-','',str_replace('/','',$cnpjCpf)));
             return $novo_valor;
     }

     public function mesTraduzido($mes) {
             $arr_mes = array('','Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
             return $arr_mes[$mes];
     }

     public function geraSenhaAleatoria($qtdCaracteres) {

             $arrChar = array("1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","j","k","m","n","p","q","r","s","t","u","v","x","w","y","z","A","B","C","D","E","F","G","H","J","K","M","N","P","Q","R","S","T","U","V","X","W","Y","Z");
             $qtd = sizeof($arrChar);

             $senha = "";

             for($i=0;$i<$qtdCaracteres;$i++) {

                     $rand = rand(0,$qtd);
                     if(isset($arrChar[$rand])) {
                             $senha .= $arrChar[$rand];
                     }

             }

             return $senha;

     }

     public function mask($val, $mask) {

             $maskared = '';
             $k = 0;

             for($i = 0; $i<=strlen($mask)-1; $i++) {
                     if($mask[$i] == '#') {
                             if(isset($val[$k]))
                                     $maskared .= $val[$k++];
                     } else {
                             if(isset($mask[$i]))
                                     $maskared .= $mask[$i];
                     }
             }

             return $maskared;
     }


     public function limpaString($originalString) {

             $originalName = $this->normalizeString($originalString);

             $arr_name = explode('.',$originalName);
             $name = '';

             if(sizeof($arr_name) > 0 ) {
                     for($i=0;$i<=sizeof($arr_name)-1;$i++) {
                             $name .= $arr_name[$i];
                     }           
             } else {
                     $name = $originalName;  
             }

             $name = str_replace(' ', '_',$name);

             return strtolower($name);

     }

     public function normalizeString($string) {

             $table = array(
                     'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
                     'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                     'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                     'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
                     'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                     'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                     'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                     'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
             );

             return strtr($string, $table);
     }

     public function geraCodigo($qtdBloco, $qtdPorBloco, $int = false) {

             if(!$int) {
                     $arrChar = array("1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","J","K","M","N","P","Q","R","S","T","U","V","X","W","Y","Z");  
             } else {
                     $arrChar = array("1","2","3","4","5","6","7","8","9","0");
             }

             $qtd = sizeof($arrChar);

             $codigo = '';
             $divisor = '';
             for ($i=1; $i <= $qtdBloco ; $i++) { 
                     $bloco = '';

                     for ($j=1; $j <= $qtdPorBloco ; $j++) { 
                             $rand = rand(0,($qtd-1));
                             if(isset($arrChar[$rand])) {
                                     $bloco .= $arrChar[$rand];
                             }
                     }

                     $codigo .= $divisor.$bloco;
                     $divisor = '-';
             }

             return $codigo;
     }

     public function totalDiasPorPeriodo(\DateTime $startDate, \DateTime $endDate) {

             $timestamp = strtotime('next Sunday');
             $dias = array();

             for ($i = 0; $i < 7; $i++) {

                     $diaSemana = strftime('%A', $timestamp);           

                     $first_date = strtotime($startDate->format('M j Y')." -1 days");
                     $first_date = strtotime(date("M d Y",$first_date)." next ".$diaSemana);

                     $last_date = strtotime($endDate->format('M j Y')." +1 days");//strtotime($end_date." +1 days");
                     $last_date = strtotime(date("M d Y",$last_date)." last ".$diaSemana);

                     $total =  floor(($last_date - $first_date)/(7*86400)) + 1;

                     $dias[] = array(
                             'total'=>$total,
                             'dia'=>$diaSemana
                     );


                     $timestamp = strtotime('+1 day', $timestamp);            
             }

             return $dias;
     }

     public function isDiaUtil(\DateTime $data) {

             $primeiroDiaUtil = 1;
             $ultimoDiaUtil = 5;

             $isDiaUtil = false;

             if($data->format('N') >= $primeiroDiaUtil  && $data->format('N') <= $ultimoDiaUtil) {
                     $isDiaUtil = true;
             }

             return $isDiaUtil;
     }

     public function proximoDiaUtil(\DateTime $data, $forcarProximoDia = false) {

             $newData = clone $data;

             if($forcarProximoDia) {
                     $newData->modify('+1 day');
             }

             $timestamp = $newData->format('U');
             $dia = $newData->format('N');

             if ($dia >= 6) {
                     $tsProximoDiaUtil = $timestamp + ((8 - $dia) * 3600 * 24);
             } else {
                     $tsProximoDiaUtil = $timestamp;
             }

             $proximoDiaUtil = new \DateTime();
             $proximoDiaUtil->setTimestamp($tsProximoDiaUtil);

             return $proximoDiaUtil;
     }

     public static function valorPorExtenso( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false ) {

             $singular = null;
             $plural = null;

             if ( $bolExibirMoeda )
             {
                     $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
                     $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
             }
             else
             {
                     $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
                     $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
             }

             $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
             $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
             $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
             $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");


             if ( $bolPalavraFeminina )
             {

                     if ($valor == 1) 
                     {
                             $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
                     }
                     else 
                     {
                             $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
                     }

                     $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
             }

             $z = 0;

             $valor = number_format( $valor, 2, ".", "." );
             $inteiro = explode( ".", $valor );

             for ( $i = 0; $i < count( $inteiro ); $i++ ) 
             {
                     for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ ) 
                     {
                             $inteiro[$i] = "0" . $inteiro[$i];
                     }
             }

             // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
             $rt = null;
             $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
             for ( $i = 0; $i < count( $inteiro ); $i++ )
             {
                     $valor = $inteiro[$i];
                     $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
                     $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
                     $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

                     $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
                     $t = count( $inteiro ) - 1 - $i;
                     $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
                     if ( $valor == "000")
                             $z++;
                     elseif ( $z > 0 )
                             $z--;

                     if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                             $r .= ( ($z > 1) ? " de " : "") . $plural[$t];

                     if ( $r )
                             $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
             }

             $rt = mb_substr( $rt, 1 );

             return($rt ? trim( $rt ) : "zero");
     }
    
}
