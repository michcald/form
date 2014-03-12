<?php

namespace Michcald;

use Michcald\Form;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Form
{
    private $name;
    
    private $method;
    
    private $action;
    
    private $elements = array();
    
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setMethod($method)
    {
        $this->method = $method;
        
        return $this;
    }
    
    public function getMethod()
    {
        return $this->method;
    }
    
    public function setAction($action)
    {
        $this->action = $action;
        
        return $this;
    }
    
    public function getAction()
    {
        return $this->action;
    }
    
    public function addElement(Form\Element $element)
    {
        $this->elements[] = $element;
        
        return $this;
    }
    
    public function getElements()
    {
        return $this->elements;
    }
    
    public function getElement($name)
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $name) {
                return $element;
            }
        }
        
        throw new \Exception('Element not found: ' . $name);
    }
    
    /**
     * 
     * @param array $data The values to validate
     * @param bool $strict If $data has more fields than the repo
     */
    public function isValid(array $data, $strict = true)
    {
        if ($strict && count($data) != count($this->elements)) {
            return false;
        }
        
        foreach ($this->elements as $element) {
            if (array_key_exists($element->getName(), $data)) {
                $element->setValue($data[$element->getName()]);
                if (!$element->isValid()) {
                    return false;
                }
            } else if ($strict) {
                return false;
            }
        }
        
        return true;
    }
    
    public function getErrorMessages()
    {
        $errors = array();
        
        foreach ($this->fields as $field) {
            $errors[$field->getName()] = $field->getErrorMessages();
        }
        
        return $errors;
    }
    
}
