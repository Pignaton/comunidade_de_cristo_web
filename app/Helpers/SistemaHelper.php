<?php

function diaCulto($param)
{
    switch ($param) {
        case 'S':
            $resp = 'Segunda-feira';
            break;
        case 'T':
            $resp = 'Terça-feira';
            break;
        case 'Q':
            $resp = 'Quarta-feira';
            break;
        case 'U':
            $resp = 'Quinta-feira';
            break;
        case 'B':
            $resp = 'Sexta-feira';
            break;
        case 'A':
            $resp = 'Sábado';
            break;
        case 'D':
            $resp = 'Domingo';
            break;
        default:
            $resp = 'Indefinido';
    }

    return $resp;
}

function periodoCulto($param) {
    switch ($param) {
        case 'M':
            $resp = 'Manhã';
            break;
        case 'T':
            $resp = 'Tarde';
            break;
        case 'N':
            $resp = 'Noite';
            break;
        case 'I':
            $resp = 'Integral';
            break;
        default:
            $resp = 'Indefinido';
    }
    return $resp;
}
