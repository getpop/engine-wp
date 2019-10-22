<?php
namespace PoP\EngineWP\Hooks;

use PoP\Engine\Hooks\AbstractHookSet;

class TemplateHookSet extends AbstractHookSet
{
    protected function init()
    {
        $this->hooksAPI->addFilter(
            'template_include',
            [$this, 'setTemplate']
        );
    }
    public function setTemplate($template)
    {
        // If doing JSON, for sure return json.php which only prints the encoded JSON
        if (doingJson()) {
            return POP_ENGINEWP_TEMPLATES.'/output.php';
        }
        return $template;
    }
}
