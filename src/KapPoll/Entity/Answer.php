<?php
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

