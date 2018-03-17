<?php

/**
 * Gravatar.php.
 *
 * @author   : Jakub Vyvazil <jakub@vyvazil.cz>
 * @copyright: 2018
 */

namespace Nofutur3\Toolbox\Latte\Macros;

use Latte\Compiler;
use Latte\MacroNode;
use Latte\Macros\MacroSet;
use Latte\PhpWriter;

class Gravatar extends MacroSet
{
    public static function install(Compiler $compiler)
    {
        $self = new static($compiler);
        /*
         * {img [namespace/]$name[, $size[, $flags]]}
         */
        $self->addMacro('gravatar', [$self, 'macroGravatar'], null, [$self, 'macroAttrImg']);
        $self->addMacro('gravatarSrc', [$self, 'macroGravatarSrc'], null, [$self, 'macroAttrImg']);

        return $self;
    }

    /**
     * This macro is used for creating <img> with gravatar for email address.
     *
     * @param MacroNode $node
     * @param PhpWriter $writer
     */
    public function macroGravatar(MacroNode $node, PhpWriter $writer)
    {
    }

    /**
     * This macro is used for getting src of gravatar for email address.
     *
     * @param MacroNode $node
     * @param PhpWriter $writer
     */
    public function macroGravatarSrc(MacroNode $node, PhpWriter $writer)
    {
    }
}
