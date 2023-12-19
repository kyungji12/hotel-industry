<?php
class Room
{
    public $id;
    public $type;
    public $availability;
    public $status;
    public $details;

    public function __construct($id, $type, $availability, $status, $details)
    {
        $this->id = $id;
        $this->type = $type;
        $this->availability = $availability;
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
    public function isAvailable($bool)
    {
        if ($bool == 0) {
            return "Vacant";
        } else {
            return "Occuped";
        }
    }
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    public function getAvailability()
    {
        return $this->availability;
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