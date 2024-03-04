<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'lastname'=> $this->lastname,
            'birth_date' => $this->birth_date,
            'age' => date('Y') - date('Y', strtotime($this->birth_date)),
            'posts' => Post::where('author_id', $this->id)->get()
        ];
    }
}
