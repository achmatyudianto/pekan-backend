<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->avatar != null) {
            $imageURL = url('images', $this->avatar);
        } else {
            $imageURL = url('images/no-user-image.png');
        }

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'mobile_phone'  => (string)$this->mobile_phone,
            'avatar'        => $imageURL,
            'registered'    => $this->created_at->diffForHumans(),
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'token' => $this->api_token,
            ],
        ];
    }
}
