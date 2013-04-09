<?php

namespace KapPoll\Form;

use KapitchiBase\Form\EventManagerAwareForm;

class Option extends EventManagerAwareForm
{
    public function __construct($name = null)
    {
        parent::__construct($name);
        
        
    }
    
}