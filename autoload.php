<?php
/**
 * @link      <https://github.com/SyzerPHP/Environment> for the canonical source repository.
 * @copyright Copyright (c) 2018, SyzerPHP <https://github.com/SyzerPHP>.
 * @license   <https://github.com/SyzerPHP/Environment/blob/master/LICENSE> New BSD License.
 */
define('SYZERPHP_ENVIRONMENT_NAMESPACE', 'SyzerPHP\Environment');
define('SYZERPHP_ENVIRONMENT_ADAPTER', 'PRE_LOADED');
define('SYZERPHP_ENVIRONMENT_DIRS', ['Exception']);
function e($data)
{
    return htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8');
}
function depth($var)
{
    $depth = 1;
    foreach ($var as $val) {
        if (is_array($val)) {
            $depth += depth($val);
            break;
        }
    }
    return $depth; 
}
