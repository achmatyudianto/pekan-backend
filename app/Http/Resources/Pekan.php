<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pekan extends JsonResource
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
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'type'          => $this->type,
            'description'   => $this->description,
            'amount'        => (double)$this->amount,
            'created_at'    => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at'    => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
