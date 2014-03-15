<?php

namespace Michcald\Form\Element;

class File extends \Michcald\Form\Element
{

    public function getValue($filtered = true)
    {
        $filePath = $this->value['tmp_name'];

        if ($filtered) {
            foreach ($this->filters as $filter) {
                $filter->filter($filePath);
            }
        }

        return $this->value;
    }

    public function isValid()
    {
        $filePath = $this->value['tmp_name'];

        foreach ($this->validators as $validator) {
            if (!$validator->validate($filePath)) {
                return false;
            }
        }

        return true;
    }

    public function __toString()
    {
        return '<input ' .
            'type="file" ' .
            'name="' . $this->getName() . '" ' .
            $this->getAttributesString() .
            ' />';
    }

}
