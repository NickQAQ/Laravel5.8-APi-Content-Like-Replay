<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'title'    => $this->title,
          'author'   => $this->user->name,
          'content'  => $this->content

        ];
    }
}
