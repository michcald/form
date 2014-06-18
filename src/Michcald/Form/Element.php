<?php

namespace Michcald\Form;

abstract class Element
{
    private $name;
    private $attributes = array();
    protected $validators = array();
    protected $errors = array();

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    public function getAttribute($name)
    {
        if (!isset($this->attributes[$name])) {
            throw new \Excpetion('Element not found: ' . $name);
        }

        return $this->attributes[$name];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    protected function getAttributesString()
    {
        $str = '';

        foreach ($this->attributes as $name => $value) {
            $str .= ' ' . $name . '="' . $value . '"';
        }

        return $str;
    }

    public function addValidator(\Michcald\Validator $validator)
    {
        $this->validators[] = $validator;

        return $this;
    }

    public function isValid($value)
    {
        $this->errors = array();

        foreach ($this->validators as $validator) {
            if (!$validator->validate($value)) {
                $this->errors = array_merge(
                    $this->errors,
                    $validator->getErrorMessages()
                );
            }
        }

        if (count($this->errors) > 0) {
            return false;
        }

        return true;
    }

    public function getErrorMessages()
    {
        return $this->errors;
    }

    abstract public function __toString();
}
