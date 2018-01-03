<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Env> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Env/blob/master/LICENSE> New BSD License.
 */

use Genial\Env\Env;
use Genial\Env\Key;

define('ENV_ADAPTER_ACTIVE', true);

$defaultConfig = [
    'application' => [
        'APP_SECRET_KEY' => null,
        'APP_NAME'       => 'Genial',
        'DEBUG'          => false,
        'LOG'            => true,
    ],
];

if (defined('APP_ROOT') && file_exists(APP_ROOT . '/.env.ini'))
{
    $env = parse_ini_file(APP_ROOT . '/.env.ini', true, INI_SCANNER_RAW);
    if (!isset($env['application']['APP_SECRET_KEY']) || $env['application']['APP_SECRET_KEY'] == 'null')
    {
        $key = new Key();
        $rsp_key = $key->generateKey();
        $rsp_file = file_get_contents(APP_ROOT . '/.env.ini');
        if (isset($env['application']['APP_SECRET_KEY']) && $env['application']['APP_SECRET_KEY'] == 'null')
        {
            $rsp_file = str_replace('APP_SECRET_KEY=null', "APP_SECRET_KEY = $rsp_key", $rsp_file);
            $rsp_file = str_replace('APP_SECRET_KEY= null', "APP_SECRET_KEY = $rsp_key", $rsp_file);
            $rsp_file = str_replace('APP_SECRET_KEY =null', "APP_SECRET_KEY = $rsp_key", $rsp_file);
            $rsp_file = str_replace('APP_SECRET_KEY = null', "APP_SECRET_KEY = $rsp_key", $rsp_file);
            file_put_contents(APP_ROOT . '/.env.ini', $rsp_file, LOCK_EX);
            goto doneRsp;
        }
        $rsp_file = str_replace('[application]', "[application]\nAPP_SECRET_KEY = $rsp_key", $rsp_file);
        file_put_contents(APP_ROOT . '/.env.ini', $rsp_file, LOCK_EX);
    }
    doneRsp:
    Env::setConfig($env);
} else
{
    Env::setConfig($defaultConfig);
}

unset($env);
unset($defaultConfig);

function env($section, $variable = null, $defRetVal = '')
{
    try {
        return Env::getConfig($section, $variable);
    } catch (\Genial\Env\Exception\UnderflowException $e) {
        return strval($defRetVal);
    }
}

function array_depth(array $array)
{
    $max_depth = 1;
    foreach ($array as $value) {
        if (is_array($value)) {
            $depth = array_depth($value) + 1;
            if ($depth > $max_depth) {
                $max_depth = $depth;
            }
        }
    }
    return $max_depth;
}
