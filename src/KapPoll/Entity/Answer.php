<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapPoll\Entity;

/*
 * 
 */

class Answer
{
    protected $id;
    protected $optionId;
    protected $identityId;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getOptionId() {
        return $this->optionId;
    }

    public function setOptionId($optionId) {
        $this->optionId = $optionId;
    }

    public function getIdentityId() {
        return $this->identityId;
    }

    public function setIdentityId($identityId) {
        $this->identityId = $identityId;
    }




}

