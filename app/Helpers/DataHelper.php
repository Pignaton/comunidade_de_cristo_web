<?php

function convertDataBR($data){
    return date('d/m/Y', strtotime($data));
}

function getNomeMes($mes): string
{
    switch ($mes) {
        case 1:
            return "janeiro";
        case 2:
            return "fevereiro";
        case 3:
            return "março";
        case 4:
            return "abril";
        case 5:
            return "maio";
        case 6:
            return "junho";
        case 7:
            return "julho";
        case 8:
            return "agosto";
        case 9:
            return "setembro";
        case 10:
            return "outubro";
        case 11:
            return "novembro";
        case 12:
            return "dezembro";
        default:
            return "Mês inválido";
    }
}

/**
 * @param $qtd / Informe a quantidade de iterações do loop para listar os anos.
 * @return array
 */
function selectAno($qtd = null): array
{
    $qtd = ($qtd) ?: 10;

    $options = [];

    $ano = intval(date('Y'));

    for ($i = 0; $i < $qtd; $i++, $ano--) {
        $options[$ano] = $ano;
    }

    if (empty($options)) {
        $options[$ano] = $ano;
    }
    return $options;
}
