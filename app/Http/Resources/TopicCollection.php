<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TopicCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => TopicResource::collection($this->collection)
        ];
    }
}
