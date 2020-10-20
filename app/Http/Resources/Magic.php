<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Magic extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	     return [
                'firstName'  => $this->first_name,
                'lastName'   => $this->last_name,
				'email'		 => $this->email,
				'address'	 => [
								  'street1' 	=> $this->street1,
								  'street2'     => $this->street2,
								  'city'	    => $this->city,
								  'state'	    => $this->state,
								  'zip'		    => $this->zip
								],
				'phone'		 => $this->phone,
				'quantity'   => $this->quantity,
				'total'		 => $this->total,
				'payment'	 => [
								  'ccNum'       => $this->cc_num,
								  'exp'			=> $this->exp
								]
        ];

    }
}
