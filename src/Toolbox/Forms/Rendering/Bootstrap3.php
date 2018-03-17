<?php

/**
 * Bootstrap3.php.
 *
 * @author   : Jakub Vyvazil <jakub@vyvazil.cz>
 * @copyright: 2018
 */

namespace Nofutur3\Toolbox\Forms\Rendering;

use Nette\Forms\Controls\Checkbox;
use Nette\Forms\Controls\CheckboxList;
use Nette\Forms\Controls\MultiSelectBox;
use Nette\Forms\Controls\RadioList;
use Nette\Forms\Controls\TextArea;
use Nette\Forms\Controls\TextBase;
use Nette\Forms\Form;
use Nette\Forms\Rendering\DefaultFormRenderer;

class Bootstrap3 extends DefaultFormRenderer
{
    public $wrappers = [
        'form' => [
            'container' => null,
        ],
        'error' => [
            'container' => 'div class="alert alert-error"',
            'item' => 'p',
        ],
        'group' => [
            'container' => 'fieldset',
            'label' => 'legend',
            'description' => 'p',
        ],
        'controls' => [
            'container' => null,
        ],
        'pair' => [
            'container' => 'div class=form-group',
            '.required' => 'required',
            '.optional' => null,
            '.odd' => null,
            '.error' => 'has-error',
        ],
        'control' => [
            'container' => 'span class=col-sm-10',
            '.odd' => null,
            'description' => 'span class=help-block',
            'requiredsuffix' => '',
            'errorcontainer' => 'span class=help-block',
            'erroritem' => '',
            '.required' => 'required',
            '.text' => 'text',
            '.password' => 'text',
            '.file' => 'text',
            '.submit' => 'btn btn-primary',
            '.image' => 'btn',
            '.button' => 'btn btn-default',
        ],
        'label' => [
            'container' => 'span class="col-sm-2 control-label"',
            'suffix' => null,
            'requiredsuffix' => '',
        ],
        'hidden' => [
            'container' => null,
        ],
    ];

    /**
     * Provides complete form rendering.
     *
     * @param  Form $form nette form
     * @param  string "begin", "errors", "ownerrors", "body", "end" or empty to render all
     * @param null|mixed $mode
     *
     * @return string
     */
    public function render(Form $form, $mode = null)
    {
        $form
            ->getElementPrototype()
            ->class('form-horizontal');

        foreach ($form->getControls() as $control) {
            if ($control instanceof Checkbox || $control instanceof CheckboxList || $control instanceof RadioList) {
                $control->getSeparatorPrototype()->setName(null);
            }
            if ($control instanceof Checkbox) {
                $control->getLabelPrototype()->addClass('checkbox-inline');
            }
            if ($control instanceof CheckboxList) {
                $control->getItemLabelPrototype()->addClass('checkbox-inline');
            }
            if ($control instanceof RadioList) {
                $control->getItemLabelPrototype()->addClass('radio-inline');
            }
            if ($control instanceof TextBase || $control instanceof SelectBox || $control instanceof MultiSelectBox) {
                $control->getControlPrototype()->addClass('form-control');
            }
            if ($control instanceof TextArea) {
                $control->getControlPrototype()->setAttribute('rows', 4);
            }
        }

        return parent::render($form, $mode);
    }
}
