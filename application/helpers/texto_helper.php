<?php

/**
 * Replace apenas na ultima ocorrência de um caracter em um string
 *
 * @param string $search busca
 * @param string $replace substitução
 * @param string $subject string
 * @return string string alterada
 */
function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}

function tabs($total = 1)
{
    return str_repeat(chr(9), $total);
}

/**
     * Remove todos acentos das letras em uma string
     *
     * @param string $str
     * @return string
     */
    function remove_acentos($str = "") 
    {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        //substituir qualquer coisa que não seja letra ou número por espaço
        $str = preg_replace('/[^a-z0-9]/i', ' ', $str);
        $str = preg_replace('/_+/', ' ', $str); // ideia do Bacco :)
        return $str;
    }

/**
 * Traduz o valor de estado Cívil para string
 *
 * @param string $estadoCivil
 * @return string
 */
function traduzEstadoCívil($estadoCivil)
{
    switch ($estadoCivil) {
        case '0':
            return 'Solteiro';
        break;
        case '1':
            return 'Casado';
        break;
        case '2':
            return 'Viúvo(a)';
        break;
        case '3':
            return 'Divorciado';
        break;
        case '4':
            return 'Separado';
        break;
        case '5':
            return 'União Estável';
        break;
        default:
            return '';
        break;
    }
}
