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
   
namespace Genial\Env;
   
/**
 * FormatInterface.
 */
interface FormatInterface
{
  
    /**
     * __invoke().
     *
     * Set the configuration.
     *
     * @param mixed The value to format.
     *
     * @return string The formatted value.
     */
    public function __invoke($xvalue);
  
}
