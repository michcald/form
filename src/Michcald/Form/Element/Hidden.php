<?php

namespace Michcald\Form\Element;

class Hiddent extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="hidden" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
