<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Analysis extends JsonResource
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
            'month'     => (int)$this->month,
            'amount'    => (double)$this->amount,
            'type'      => $this->type,
        ];
    }
}
