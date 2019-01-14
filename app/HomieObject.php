<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomieObject extends Model
{
    //




    function getResidentType() {
        return $this->residentType;
    }
}
