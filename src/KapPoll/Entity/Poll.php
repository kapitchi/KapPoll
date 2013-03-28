<?php
namespace KapPoll\Entity;

/*
 * 
 */

class Poll
{
    protected $id;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


}

