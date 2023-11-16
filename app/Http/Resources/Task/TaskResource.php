<?php

namespace App\Http\Resources\Task;

use App\Http\Resources\Api\Complaint\ComplaintResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'deadline' => $this->formatted_deadline,
            'is_finished' => $this->formatted_is_finished,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'complaints' => ComplaintResource::collection($this->complaints)
        ];
    }
}
