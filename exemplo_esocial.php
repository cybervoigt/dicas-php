<?php

/**
 * Código utilizado para ler alguns dados de retorno (como a base e valor de INSS)
 * de um arquivo XML (evento S-5001) que foi retornado pelo e-social
 *  (após envio do evento de folha de pagamento S-1200)
 */

teste();

function teste()
{
    
    $dom = new DOMDocument();
    $dom->loadXML( file_get_contents('exemplo-esocial.xml') );

    $conta = 0;
    foreach($dom->getElementsByTagName('retornoEventos') as $retornoEventos)
    {

        foreach($retornoEventos->getElementsByTagName('evento') as $evento)
        {
            //acho "<p>evento->Id = {$evento->getAttribute('Id')}</p>";
            $cpfTrab = '';
            $matricula = '';
            $vrCpSeg = 0;
            $valorBaseCS = 0;
            $dhRecepcao = '';

            foreach($evento->getElementsByTagName('recepcao') as $recepcao)
            {
                $dhRecepcao = $recepcao->childNodes[1]->nodeValue;
            }

            foreach($evento->getElementsByTagName('tot') as $tot)
            {

                if($tot->getAttribute('tipo') == 'S5001')
                {
                    // busca o CPF
                    foreach($tot->getElementsByTagName('ideTrabalhador') as $ideTrabalhador)
                    {
                        $cpfTrab = $ideTrabalhador->childNodes[0]->childNodes[0]->nodeValue;
                    }
                    // busca o valor cpfseg
                    foreach($tot->getElementsByTagName('infoCpCalc') as $infoCpCalc)
                    {
                        $vrCpSeg = (double)$infoCpCalc->childNodes[1]->nodeValue;
                    }
                    // busca matricula
                    // quando o mesmo CPF tem mais de 1 matrícula, 
                    // no XML existe 1 nó 'infoCategIncid' para cada matrícula
                    foreach($tot->getElementsByTagName('infoCategIncid') as $infoCategIncid)
                    {
                        $matricula = $infoCategIncid->childNodes[0]->nodeValue;
                        $valorBaseCS = (double) $infoCategIncid->childNodes[2]->childNodes[2]->nodeValue;

                        // insere na tabela...
                        echo "<p>CPF={$cpfTrab}, matricula={$matricula}, vrCpSeg={$vrCpSeg}, valorBaseCS={$valorBaseCS}</p>";
                        // guardei os valores em um banco MYSQL para depois comparar com outros dados...
                        //$sql = "insert into temp_inss (cpf,matricula,base_inss,valor_inss,nome_arquivo,dhRecepcao) values ('{$cpfTrab}', '{$matricula}', {$valorBaseCS}, {$vrCpSeg},'{$nome}','{$dhRecepcao}')";
                        //$con->exec($sql);
                        $conta++;
                    }
                }
            }
        }
    }
    echo "registros lidos e inserdos no banco de dados: {$conta}";
}

 
?>