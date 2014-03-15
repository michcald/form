<?php

namespace Michcald\Form\Element;

class Url extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="url" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
