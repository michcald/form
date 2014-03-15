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
        if (!is_array($this->value) || 
            !array_key_exists('tmp_name', $this->value)) {
            return false;
        }
        
        $filePath = $this->value['tmp_name'];

        foreach ($this->validators as $validator) {
            if (!$validator->validate($filePath)) {
                return false;
            }
        }

        return true;
    }
    
    public function getErrorMessages()
    {
        $errors = array();
        
        if (!is_array($this->value) || 
            !array_key_exists('tmp_name', $this->value)) {
            $errors[] = 'Must be a file';
            return false;
        }

        foreach ($this->validators as $validator) {
            if (!$validator->validate($this->value['tmp_name'])) {
                $errors = array_merge($errors, $validator->getErrorMessages());
            }
        }

        return $errors;
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
