<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magic extends Model
{
    protected $fillable = [
                            'first_name',
                            'last_name',
                            'email',
                            'street1',
                            'street2', 
                            'city', 
                            'state',
                            'zip',
                            'phone',
                            'quantity',
                            'total',
                            'cc_num', 
                            'exp'
                ];
}

