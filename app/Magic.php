<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magic extends Model
{
    protected $tables = [
                            'customers',
                            'addresses',
                            'orders',
                            'payments'
    ];
    protected $fillable = [
                            'first_name',
                            'last_name',
                            'email',
                            'address' => [
                                            'street1',
                                            'street2', 
                                            'city', 
                                            'state',
                                            'zip',
                                         ],   
                            'phone',                            
                            'payment' => [
                                            'cc_num', 
                                            'exp'
                                         ],
                            'quantity',
                            'total',
                            'orderDate',
                            'fulfilled'
    ];
}

