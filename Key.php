<?php
/**
 * @link      <https://github.com/SyzerPHP/Environment> for the canonical source repository.
 * @copyright Copyright (c) 2018, SyzerPHP <https://github.com/SyzerPHP>.
 * @license   <https://github.com/SyzerPHP/Environment/blob/master/LICENSE> New BSD License.
 */
namespace SyzerPHP\Environment;
/**
 * Key.
 */
class Key
{
    /**
     * @var string|%% $prefix The key prefix.
     */
    private $prefix = '[SYZER]@';
    /**
     * generateKey().
     *
     * Generate a secret key for SyzerPHP.
     *
     * @return string The generated key.
     */
    public function generateKey(): string
    {
        return (string) $this->prefix . \bin2hex(\random_bytes(10));
    }
}
