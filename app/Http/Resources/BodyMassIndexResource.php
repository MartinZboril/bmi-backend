<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BodyMassIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sex' => $this->sex,
            'age' => $this->age,
            'height' => $this->height,
            'weight' => $this->weight,
            'index' => $this->index,
            'note' => $this->note,
            'created_at' => $this->created_at,            
        ];
    }
}
