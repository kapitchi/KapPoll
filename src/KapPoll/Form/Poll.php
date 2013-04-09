<?php

namespace KapPoll\Form;

use KapitchiBase\Form\EventManagerAwareForm;

class Poll extends EventManagerAwareForm
{
    public function __construct($name = null)
    {
        parent::__construct($name);
        
        
    }
    
}