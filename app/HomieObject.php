<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class HomieObject extends Model
{
    //
    public $timestamps = false;

    

    function getResidentType() {
        return $this->residentType;
    }
}
