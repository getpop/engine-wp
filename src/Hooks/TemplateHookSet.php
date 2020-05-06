<?php

declare(strict_types=1);

namespace PoP\EngineWP\Hooks;

use PoP\Engine\Hooks\AbstractHookSet;
use PoP\EngineWP\Templates\TemplateHelpers;

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
            return TemplateHelpers::getTemplateFile();
        }
        return $template;
    }
}
