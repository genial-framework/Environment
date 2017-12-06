<?php
/**
 * Genial Framework (https://nenglish.me/php/genial-framework/).
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Genial Framework. (https://nenglish.me/php/genial-framework/)
 * @license   https://nenglish.me/php/genial-framework/license/new-bsd/ New BSD License
 */
use Genial\Env\Env;

$env = parse_ini_file(APP_ROOT.'/.env.ini', true, INI_SCANNER_RAW);
Env::setConfig($env);
function env($section, $variable = null)
{
    return Env::getConfig($section, $variable);
}
