<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
         return [
             
             'fullname' => $this->fullname,
             'email' => $this->email,
             'phone' => $this->phone,
             'age' => $this->age,
             'address' => $this->address,
             'created_at' => $this->created_at,
         ];
    }
}
