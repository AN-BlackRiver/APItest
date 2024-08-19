<?php

namespace App\Http\Resources;

use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_completed' => (bool)$this->is_completed,
            'priority' => PriorityResource::make($this->whenLoaded('priority')),
        ];
    }
}
