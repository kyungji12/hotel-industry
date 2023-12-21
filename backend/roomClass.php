<?php
class Room
{
    public $id;
    public $type;
    public $status;
    public $details;

    public function __construct($id, $type, $status, $details)
    {
        $this->id = $id;
        $this->type = $type;
        $this->status = $status;
        $this->details = $details;
    }
    //getters and setter
    public function getId()
    {
        return $this->id;
    }
    public function getType()
    {
        return $this->type;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getDetails()
    {
        return $this->details;
    }
}


?>
