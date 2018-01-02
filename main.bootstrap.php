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
    $formatter = new Formatter();
    Env::setConfig($formatter->initialize($env));
} else
{
    Env::setConfig($defaultConfig);
}

unset($env);
unset($defaultConfig);
unset($formatter);

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
