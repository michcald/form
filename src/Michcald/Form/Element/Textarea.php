<?php

namespace Michcald\Form\Element;

class Textarea extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<textarea ' .
            'name="' . $this->getName() . '"' .
            $this->getAttributesString() .
            '>' .
            $this->getValue() .
            '</textarea>';
    }

}
