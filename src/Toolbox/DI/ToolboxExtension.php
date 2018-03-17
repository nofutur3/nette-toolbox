<?php
/**
 * ToolboxExtension.php.
 *
 * @author   : Jakub Vyvazil <jakub@vyvazil.cz>
 * @copyright: 2018
 */

namespace Nofutur3\Toolbox\DI;

use Nette\DI\CompilerExtension;
use Nofutur3\Toolbox\Latte\Macros\Gravatar;

if (!class_exists('Nette\DI\CompilerExtension')) {
    class_alias('Nette\Config\CompilerExtension', 'Nette\DI\CompilerExtension');
    class_alias('Nette\Config\Compiler', 'Nette\DI\Compiler');
    class_alias('Nette\Config\Configurator', 'Nette\DI\Configurator');
}
if (!class_exists('Latte\Engine')) {
    class_alias('Nette\Latte\Engine', 'Latte\Engine');
}

class ToolboxExtension extends CompilerExtension
{
    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();
        $engine = $builder->getDefinition('nette.latteFactory');

        if (method_exists('Latte\Engine', 'getCompiler')) {
            $engine->addSetup(Gravatar::class.'::install(?->getCompiler())', ['@self']);
        } else {
            $engine->addSetup(Gravatar::class.'::install(?->compiler)', ['@self']);
        }
    }
}
