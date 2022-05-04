<?php

namespace App\Usecase\Boleto;

use App\Models\Order;

class BoletoUsecase {


    public static function getBoleto(int $id)
    {
        $order = Order::find($id);
        // DADOS DO BOLETO PARA O SEU CLIENTE
        $dias_de_prazo_para_pagamento = 10;
        $taxa_boleto = 5.00;
        $data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
        $valor_cobrado = formatPrice($order->total); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
        $valor_cobrado = str_replace(",", ".",$valor_cobrado);
        // dd(is_numeric($taxa_boleto));
        $valor_boleto=number_format($order->total+$taxa_boleto, 2, ',', '');

        $dadosboleto["nosso_numero"] = $order->id;  // Nosso numero - REGRA: Máximo de 8 caracteres!
        $dadosboleto["numero_documento"] = $order->id;	// Num do pedido ou nosso numero
        $dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
        $dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
        $dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
        $dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

        // DADOS DO SEU CLIENTE
        $dadosboleto["sacado"] = $order->person;
        $dadosboleto["endereco1"] = $order->address;
        $dadosboleto["endereco2"] = $order->city;

        // INFORMACOES PARA O CLIENTE
        $dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja AngoStore";
        $dadosboleto["demonstrativo2"] = "Taxa bancária - AKZ 0,00";
        $dadosboleto["demonstrativo3"] = "";
        $dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
        $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
        $dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: miguelleite200leite@gmail.com";
        $dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto Loja AngoStore E-commerce - www.angostore.co.ao";

        // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
        $dadosboleto["quantidade"] = "";
        $dadosboleto["valor_unitario"] = "";
        $dadosboleto["aceite"] = "";		
        $dadosboleto["especie"] = "AKZ";
        $dadosboleto["especie_doc"] = "";


        // ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


        // DADOS DA SUA CONTA - ITAÚ
        $dadosboleto["agencia"] = "1690"; // Num da agencia, sem digito
        $dadosboleto["conta"] = "48781";	// Num da conta, sem digito
        $dadosboleto["conta_dv"] = "2"; 	// Digito do Num da conta

        // DADOS PERSONALIZADOS - ITAÚ
        $dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

        // SEUS DADOS
        $dadosboleto["identificacao"] = "AngoStore";
        $dadosboleto["cpf_cnpj"] = "24.700.731/0001-08";
        $dadosboleto["endereco"] = "Angola, Luanda-Cacuaco";
        $dadosboleto["cidade_uf"] = "Luanda";
        $dadosboleto["cedente"] = "AngoStore";

        // NÃO ALTERAR!
        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Usecase' . DIRECTORY_SEPARATOR 
        . 'Boleto' . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR;

        // require_once($path. "funcoes_itau.php");
        include("include/funcoes_itau.php"); 
        include("include/layout_itau.php");
    }
}