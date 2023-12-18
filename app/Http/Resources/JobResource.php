<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'company' => $this->company,
            'description' => $this->description,
            'from' => ($this->from)->format('Y-m'),
            'to' => ($this->to)->format('Y-m'),
        ];
    }
}
