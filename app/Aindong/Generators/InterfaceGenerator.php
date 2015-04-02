<?php
namespace Aindong\Generators;

use Illuminate\Support\Pluralizer;

class InterfaceGenerator extends Generator {
    protected $template;

    public function getTemplate($name)
    {
        $path = 'app/Aindong/Generators/templates/interface.txt';
        $this->template = $this->file->get($path);
        $name = strtolower(Pluralizer::plural(
            str_ireplace('Interface', '', $name)
        ));

        // Prepare strings to be placed on the template
        $singular       = Pluralizer::singular(ucfirst($name));
        $singularLower  = strtolower($singular);
        $plural         = Pluralizer::plural(ucfirst($name));

        // Replace
        $this->template = str_replace('{{singular}}', $singular, $this->template);
        $this->template = str_replace('{{plural}}', $plural, $this->template);
        $this->template = str_replace('{{singularLower}}', $singularLower, $this->template);

        return $this->template;
    }
}