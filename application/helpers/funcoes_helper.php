<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('servidor_http')) {

    function servidor_http($url, $filters = array())
    {
        $resultado = new stdClass();
        $resultado->success = false;
        $resultado->conteudo = '';

        $CI =& get_instance();
        $api_url = $CI->config->config['api_url'];
        $api_token = $CI->config->config['gitlab_token'];

        $tem_filtro = (empty($filters)) ? '' : '&';

        $solicitacao = array(
            CURLOPT_URL => "{$api_url}{$url}?private_token={$api_token}{$tem_filtro}" . http_build_query($filters),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 100,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array("Cache-Control: no-cache"),
            CURLOPT_VERBOSE => 1,
            CURLOPT_HEADER => 1
        );

        $curl = curl_init();
        curl_setopt_array($curl, $solicitacao);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        $headers_array = explode("\r\n", $headers);

        $array_header = array();
        foreach ($headers_array as $value) {
            if (substr($value, 0, (strlen($value) * -1) + 1) === 'X'):
                $valor = explode(":", $value);
                $array_header[$valor[0]] = $valor[1];
            endif;
        }

        curl_close($curl);

        if ($err) {
            $resultado->conteudo = $err;
        } else {
            $resultado->success = true;
            $resultado->header = $array_header;
            $resultado->conteudo = json_decode($body);
        }
        return $resultado;
    }
}

if (!function_exists('pd')) {

    function pd($valor)
    {
        echo "<pre>";
        print_r($valor);
        echo "</pre>";
        die();

    }
}

if (!function_exists('soNumeros')) {

    function soNumeros($valor)
    {
        return preg_replace("/[^0-9]/", "", $valor);
    }

}

if (!function_exists('soCodigo')) {

    function soCodigo($valor)
    {
        $aux = explode('#', preg_replace("/[^0-9#]/", "", $valor));
        return $aux[0];
    }

}

if (!function_exists('geraSenha')) {

    function geraSenha($senha)
    {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

}

if (!function_exists('verificaSenha')) {

    function verificaSenha($senha, $senhaBanco)
    {
        return (password_verify($senha, $senhaBanco)) ? true : false;
    }

}

if (!function_exists('mask')) {

    function mask($string, $tipo)
    {
        if (empty($string)) {
            return $string;
        }

        if (strtolower($tipo) == 'cpf_cnpj') {
            if (strlen(preg_replace('/[^0-9]/', '', $string)) == 11):
                return preg_replace("/([0-9]{3}\.?)([0-9]{3}\.?)([0-9]{3}\-?)([0-9]{2})/", "$1.$2.$3-$4", $string);
            else:
                return preg_replace("/([0-9]{2}\.?)([0-9]{3}\.?)([0-9]{3}\-?)([0-9]{4})([0-9]{2})/", "$1.$2.$3/$4-$5", $string);
            endif;
        }

        if (strtolower($tipo) == 'telefone') {
            $mascara = (strlen($string) < 11) ? '(##) #### ####' : '(##) ##### ####';
        }

        if (strtolower($tipo) == 'cep') {
            $mascara = '#####-###';
        }
        $string = str_replace(" ", "", $string);
        for ($i = 0; $i < strlen($string); $i++) {
            $mascara[strpos($mascara, "#")] = $string[$i];
        }
        return $mascara;
    }
}

if (!function_exists('removeAcentos')) {

    function removeAcentos($string)
    {
        return preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    }

}

if (!function_exists('setNull')) {

    function setNull($string)
    {
        return (empty($string)) ? null : $string;
    }

}

if (!function_exists('temAcesso')) {

    function temAcesso($acessos, $codPagina)
    {
        return (strstr($acessos, $codPagina)) ? '' : 'style="display: none"';
    }

}

if (!function_exists('formatData')) {

    function formatData($data)
    {
        if (empty($data)) {
            return "";
        }
        return ucfirst(date('d/m/Y', strtotime($data)));
    }

}

if (!function_exists('selCombo')) {

    function selCombo($dado, $campo)
    {
        return ($dado == $campo) ? "selected" : "";
    }

}

if (!function_exists('formatarDataHtmlToSQL')) {

    function formatarDataHtmlToSQL($data)
    {
        return preg_replace("/([0-9]{2}).?([0-9]{2}).?([0-9]{4})/", "$3-$2-$1", $data);
    }
}

if (!function_exists('formatarDataSQLToHtml')) {

    function formatarDataSQLToHtml($data)
    {
        return preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3/$2/$1", $data);
    }
}


if (!function_exists('formatarDataAngularToHtml')) {

    function formatarDataAngularToHtml($data)
    {
        return preg_replace("/([0-9]{2}).?([0-9]{2}).?([0-9]{4})/", "$1/$2/$3", $data);
    }
}

if (!function_exists('NovaSenha')) {

    function NovaSenha($length = 4, $chars = '123456789DS')
    {
        if ($length > 0) {
            $len_chars = (strlen($chars) - 1);
            $the_chars = $chars{rand(0, $len_chars)};
            for ($i = 1; $i < $length; $i = strlen($the_chars)) {
                $r = $chars{rand(0, $len_chars)};
                if ($r != $the_chars{$i - 1}) {
                    $the_chars .= $r;
                }
            }
            return $the_chars;
        }
    }

}


if (!function_exists('verifica_email')) {

    function verifica_email($email)
    {
        $exp_regular = '/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})$/';
        $ret = preg_match($exp_regular, $email);
        return ($ret === 1);
    }
}


if (!function_exists('eNull')) {

    function eNull($dado)
    {
        return (!isset($dado) || empty($dado) || strtoupper($dado) == 'NULL' || trim($dado) == '') ? NULL : $dado;
    }

}

if (!function_exists('getMesDataHtml')) {

    function getMesDataHtml($data)
    {
        return preg_replace("/([0-9]{2}).?([0-9]{2}).?([0-9]{4})/", "$2", $data);
    }
}

if (!function_exists('getAnoDataHtml')) {

    function getAnoDataHtml($data)
    {
        return preg_replace("/([0-9]{2}).?([0-9]{2}).?([0-9]{4})/", "$3", $data);
    }
}

if (!function_exists('stringTodateBanco')) {

    function stringTodateBanco($data)
    {
        $date_source = strtotime($data);
        return date('Y-m-d H:i:s', $date_source);
    }

}

