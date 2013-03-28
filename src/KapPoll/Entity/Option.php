<?php
namespace KapPoll\Entity;

/*
 * 
 */

class Option
{
    protected $id;
    protected $name;
    protected $pollId;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPollId() {
        return $this->pollId;
    }

    public function setPollId($pollId) {
        $this->pollId = $pollId;
    }



}

