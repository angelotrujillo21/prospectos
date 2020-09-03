<?php
/*
 * Helpers, as the name suggests, help you with tasks.
 * Each helper file is simply a collection of functions in a particular category.
 */

/**
 * @param $paths
 * @param $data
 * @return mixed
 *
 * Extends the View by loading another file relative the base Views Path.
 */
function extend_view($paths, $data)
{
    // Set each index of data to its named variable.
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    foreach ($paths as $path) {
        ob_start();
        include VIEWS_PATH . $path . '.php';
        ob_flush();
    }
}

/**
 * @param $paths
 *
 * Loads Javascripts.
 */
function load_script($paths)
{
    foreach ($paths as $path) {
        echo '<script src="' . WEB_ROOT_RESOURCE . 'js/' . $path . '.js"></script>' . "\r\n";
    }
}

/**
 * @param $paths
 * Loads CSS Styles
 */
function load_style($paths)
{
    foreach ($paths as $path) {
        echo '<link rel="stylesheet" href="' . WEB_ROOT_RESOURCE . 'css/' . $path . '.css" type="text/css" />' . "\r\n";
    }
}

function load_style_plugin($paths)
{
    foreach ($paths as $path) {
        echo '<link rel="stylesheet" href="' . WEB_ROOT_RESOURCE . 'plugins/' . $path . '.css" type="text/css" />' . "\r\n";
    }
}

function load_script_plugin($paths)
{
    foreach ($paths as $path) {
        echo '<script src="' . WEB_ROOT_RESOURCE . 'plugins/' . $path . '.js"></script>' . "\r\n";
    }
}

function src($path)
{
    return WEB_ROOT_RESOURCE . 'images/' . $path;
}



/*Load Admin */

function load_style_admin($paths)
{
    foreach ($paths as $path) {
        echo '<link rel="stylesheet" href="' . WEB_ROOT_RESOURCE . 'assets/' . $path . '.css" type="text/css" />' . "\r\n";
    }
}

function load_script_admin($paths)
{
    foreach ($paths as $path) {
        echo '<script src="' . WEB_ROOT_RESOURCE . 'assets/' . $path . '.js"></script>' . "\r\n";
    }
}

function srcAdmin($path)
{
    return WEB_ROOT_RESOURCE . 'assets/' . $path;
}

function route($path)
{
    return WEB_ROOT . $path;
}

function routePdf($path)
{
    return WEB_ROOT_RESOURCE . 'pdf/' . $path;
}

function sanitize($url, $flag = false)
{
    $url = strtolower($url);
    $url = str_replace(" ", "-", $url);
    if ($flag) {
        return (filter_var($url, FILTER_SANITIZE_URL));
    } else {
        return route(filter_var($url, FILTER_SANITIZE_URL));
    }
}

function reArrayFiles(&$file_post)
{
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function array_diff_assoc_recursive($array1, $array2)
{
    $difference = array();
    foreach ($array1 as $key => $value) {
        if (is_array($value)) {
            if (!isset($array2[$key]) || !is_array($array2[$key])) {
                $difference[$key] = $value;
            } else {
                $new_diff = array_diff_assoc_recursive($value, $array2[$key]);
                if (!empty($new_diff)) {
                    $difference[$key] = $new_diff;
                }
            }
        } elseif (!array_key_exists($key, $array2) || $array2[$key] !== $value) {
            $difference[$key] = $value;
        }
    }
    return $difference;
}



function formatDate($fecha, $horas = true)
{
    return $horas ? date("d-m-Y H:i:s", strtotime($fecha)) : date("d-m-Y", strtotime($fecha));
}

function nf($number)
{
    return number_format(($number), 2, ".", "");
}

function validate($string)
{
    return (isset($string) && !empty($string)) ? $string : '';
}

function uc($string)
{
    return mb_convert_case(mb_strtolower($string, "UTF-8"), MB_CASE_TITLE, "UTF-8");
}

function sp($input)
{
    return str_pad($input, 8, "0", STR_PAD_LEFT);
}

function array_msort($array, $cols)
{
    $colarr = array();
    foreach ($cols as $col => $order) {
        $colarr[$col] = array();
        foreach ($array as $k => $row) {
            $colarr[$col]['_' . $k] = strtolower($row[$col]);
        }
    }
    $eval = 'array_multisort(';
    foreach ($cols as $col => $order) {
        $eval .= '$colarr[\'' . $col . '\'],' . $order . ',';
    }
    $eval = substr($eval, 0, -1) . ');';
    eval($eval);
    $ret = array();
    foreach ($colarr as $col => $arr) {
        foreach ($arr as $k => $v) {
            $k = substr($k, 1);
            if (!isset($ret[$k])) {
                $ret[$k] = $array[$k];
            }

            $ret[$k][$col] = $array[$k][$col];
        }
    }
    return $ret;
}

function sanitizePhone($phone)
{
    $phone = str_replace(" ", "", $phone);
    $phone = str_replace("-", "", $phone);
    return trim($phone);
}

function logicaPorcentajeMonto($total, $tipo, $numero)
{
    $valor = 0;
    if ($tipo == '%') {
        $valor = $total * ($numero / 100);
    } else {
        $valor = $numero;
    }
    return $valor;
}

function array_to_obj($array, &$obj)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $obj->$key = new stdClass();
            array_to_obj($value, $obj->$key);
        } else {
            $obj->$key = $value;
        }
    }
    return $obj;
}

function arrayToObject($array)
{
    $object = new stdClass();
    return array_to_obj($array, $object);
}

function dividirArrayByKey($arrays, $key)
{
    $data = array();
    foreach ($arrays as $array) {
        $data[$array[$key]][] = $array;
    }
    return $data;
}
function getNameMesById($id_mes)
{
    $mes = "";
    switch ($id_mes) {
        case "01":
            $mes = "Enero";
            break;
        case "02":
            $mes = "Febrero";
            break;
        case "03":
            $mes = "Marzo";
            break;
        case "04":
            $mes = "Abril";
            break;
        case "05":
            $mes = "Mayo";
            break;
        case "06":
            $mes = "Junio";
            break;
        case "07":
            $mes = "Julio";
            break;
        case "08":
            $mes = "Agosto";
            break;
        case "09":
            $mes = "Septiembre";
            break;
        case "10":
            $mes = "Octubre";
            break;
        case "11":
            $mes = "Noviembre";
            break;
        case "12":
            $mes = "Diciembre";
            break;
    }
    return $mes;
}

function unidad($numuero)
{
    switch ($numuero) {
        case 9: {
                $numu = "NUEVE";
                break;
            }
        case 8: {
                $numu = "OCHO";
                break;
            }
        case 7: {
                $numu = "SIETE";
                break;
            }
        case 6: {
                $numu = "SEIS";
                break;
            }
        case 5: {
                $numu = "CINCO";
                break;
            }
        case 4: {
                $numu = "CUATRO";
                break;
            }
        case 3: {
                $numu = "TRES";
                break;
            }
        case 2: {
                $numu = "DOS";
                break;
            }
        case 1: {
                $numu = "UNO";
                break;
            }
        case 0: {
                $numu = "";
                break;
            }
    }
    return $numu;
}

function decena($numdero)
{
    if ($numdero >= 90 && $numdero <= 99) {
        $numd = "NOVENTA ";
        if ($numdero > 90) {
            $numd = $numd . "Y " . (unidad($numdero - 90));
        }
    } elseif ($numdero >= 80 && $numdero <= 89) {
        $numd = "OCHENTA ";
        if ($numdero > 80) {
            $numd = $numd . "Y " . (unidad($numdero - 80));
        }
    } elseif ($numdero >= 70 && $numdero <= 79) {
        $numd = "SETENTA ";
        if ($numdero > 70) {
            $numd = $numd . "Y " . (unidad($numdero - 70));
        }
    } elseif ($numdero >= 60 && $numdero <= 69) {
        $numd = "SESENTA ";
        if ($numdero > 60) {
            $numd = $numd . "Y " . (unidad($numdero - 60));
        }
    } elseif ($numdero >= 50 && $numdero <= 59) {
        $numd = "CINCUENTA ";
        if ($numdero > 50) {
            $numd = $numd . "Y " . (unidad($numdero - 50));
        }
    } elseif ($numdero >= 40 && $numdero <= 49) {
        $numd = "CUARENTA ";
        if ($numdero > 40) {
            $numd = $numd . "Y " . (unidad($numdero - 40));
        }
    } elseif ($numdero >= 30 && $numdero <= 39) {
        $numd = "TREINTA ";
        if ($numdero > 30) {
            $numd = $numd . "Y " . (unidad($numdero - 30));
        }
    } elseif ($numdero >= 20 && $numdero <= 29) {
        if ($numdero == 20) {
            $numd = "VEINTE ";
        } else {
            $numd = "VEINTI" . (unidad($numdero - 20));
        }
    } elseif ($numdero >= 10 && $numdero <= 19) {
        switch ($numdero) {
            case 10: {
                    $numd = "DIEZ ";
                    break;
                }
            case 11: {
                    $numd = "ONCE ";
                    break;
                }
            case 12: {
                    $numd = "DOCE ";
                    break;
                }
            case 13: {
                    $numd = "TRECE ";
                    break;
                }
            case 14: {
                    $numd = "CATORCE ";
                    break;
                }
            case 15: {
                    $numd = "QUINCE ";
                    break;
                }
            case 16: {
                    $numd = "DIECISEIS ";
                    break;
                }
            case 17: {
                    $numd = "DIECISIETE ";
                    break;
                }
            case 18: {
                    $numd = "DIECIOCHO ";
                    break;
                }
            case 19: {
                    $numd = "DIECINUEVE ";
                    break;
                }
        }
    } else {
        $numd = unidad($numdero);
    }
    return $numd;
}

function centena($numc)
{
    if ($numc >= 100) {
        if ($numc >= 900 && $numc <= 999) {
            $numce = "NOVECIENTOS ";
            if ($numc > 900) {
                $numce = $numce . (decena($numc - 900));
            }
        } elseif ($numc >= 800 && $numc <= 899) {
            $numce = "OCHOCIENTOS ";
            if ($numc > 800) {
                $numce = $numce . (decena($numc - 800));
            }
        } elseif ($numc >= 700 && $numc <= 799) {
            $numce = "SETECIENTOS ";
            if ($numc > 700) {
                $numce = $numce . (decena($numc - 700));
            }
        } elseif ($numc >= 600 && $numc <= 699) {
            $numce = "SEISCIENTOS ";
            if ($numc > 600) {
                $numce = $numce . (decena($numc - 600));
            }
        } elseif ($numc >= 500 && $numc <= 599) {
            $numce = "QUINIENTOS ";
            if ($numc > 500) {
                $numce = $numce . (decena($numc - 500));
            }
        } elseif ($numc >= 400 && $numc <= 499) {
            $numce = "CUATROCIENTOS ";
            if ($numc > 400) {
                $numce = $numce . (decena($numc - 400));
            }
        } elseif ($numc >= 300 && $numc <= 399) {
            $numce = "TRESCIENTOS ";
            if ($numc > 300) {
                $numce = $numce . (decena($numc - 300));
            }
        } elseif ($numc >= 200 && $numc <= 299) {
            $numce = "DOSCIENTOS ";
            if ($numc > 200) {
                $numce = $numce . (decena($numc - 200));
            }
        } elseif ($numc >= 100 && $numc <= 199) {
            if ($numc == 100) {
                $numce = "CIEN ";
            } else {
                $numce = "CIENTO " . (decena($numc - 100));
            }
        }
    } else {
        $numce = decena($numc);
    }

    return $numce;
}

function miles($nummero)
{
    if ($nummero >= 1000 && $nummero < 2000) {
        $numm = "MIL " . (centena($nummero % 1000));
    }
    if ($nummero >= 2000 && $nummero < 10000) {
        $numm = unidad(Floor($nummero / 1000)) . " MIL " . (centena($nummero % 1000));
    }
    if ($nummero < 1000) {
        $numm = centena($nummero);
    }

    return $numm;
}

function decmiles($numdmero)
{
    if ($numdmero == 10000) {
        $numde = "DIEZ MIL";
    }
    if ($numdmero > 10000 && $numdmero < 20000) {
        $numde = decena(Floor($numdmero / 1000)) . "MIL " . (centena($numdmero % 1000));
    }
    if ($numdmero >= 20000 && $numdmero < 100000) {
        $numde = decena(Floor($numdmero / 1000)) . " MIL " . (miles($numdmero % 1000));
    }
    if ($numdmero < 10000) {
        $numde = miles($numdmero);
    }

    return $numde;
}

function cienmiles($numcmero)
{
    if ($numcmero == 100000) {
        $num_letracm = "CIEN MIL";
    }
    if ($numcmero >= 100000 && $numcmero < 1000000) {
        $num_letracm = centena(Floor($numcmero / 1000)) . " MIL " . (centena($numcmero % 1000));
    }
    if ($numcmero < 100000) {
        $num_letracm = decmiles($numcmero);
    }
    return $num_letracm;
}

function millon($nummiero)
{
    if ($nummiero >= 1000000 && $nummiero < 2000000) {
        $num_letramm = "UN MILLON " . (cienmiles($nummiero % 1000000));
    }
    if ($nummiero >= 2000000 && $nummiero < 10000000) {
        $num_letramm = unidad(Floor($nummiero / 1000000)) . " MILLONES " . (cienmiles($nummiero % 1000000));
    }
    if ($nummiero < 1000000) {
        $num_letramm = cienmiles($nummiero);
    }

    return $num_letramm;
}

function decmillon($numerodm)
{
    if ($numerodm == 10000000) {
        $num_letradmm = "DIEZ MILLONES";
    }
    if ($numerodm > 10000000 && $numerodm < 20000000) {
        $num_letradmm = decena(Floor($numerodm / 1000000)) . "MILLONES " . (cienmiles($numerodm % 1000000));
    }
    if ($numerodm >= 20000000 && $numerodm < 100000000) {
        $num_letradmm = decena(Floor($numerodm / 1000000)) . " MILLONES " . (millon($numerodm % 1000000));
    }
    if ($numerodm < 10000000) {
        $num_letradmm = millon($numerodm);
    }

    return $num_letradmm;
}

function cienmillon($numcmeros)
{
    if ($numcmeros == 100000000) {
        $num_letracms = "CIEN MILLONES";
    }
    if ($numcmeros >= 100000000 && $numcmeros < 1000000000) {
        $num_letracms = centena(Floor($numcmeros / 1000000)) . " MILLONES " . (millon($numcmeros % 1000000));
    }
    if ($numcmeros < 100000000) {
        $num_letracms = decmillon($numcmeros);
    }
    return $num_letracms;
}

function milmillon($nummierod)
{
    if ($nummierod >= 1000000000 && $nummierod < 2000000000) {
        $num_letrammd = "MIL " . (cienmillon($nummierod % 1000000000));
    }
    if ($nummierod >= 2000000000 && $nummierod < 10000000000) {
        $num_letrammd = unidad(Floor($nummierod / 1000000000)) . " MIL " . (cienmillon($nummierod % 1000000000));
    }
    if ($nummierod < 1000000000) {
        $num_letrammd = cienmillon($nummierod);
    }

    return $num_letrammd;
}


function convertir($numero)
{
    $num = str_replace(",", "", $numero);
    $num = number_format($num, 2, '.', '');
    $cents = substr($num, strlen($num) - 2, strlen($num) - 1);
    $num = (int)$num;

    $numf = milmillon($num);

    return   $numf . " CON " . $cents . "/100" . TEXTO_MONEDA;
}


/* fin load admin*/