<?php

namespace App\Http\Controllers\Discussions;

use App\Http\Requests\DiscussionsStoreRequest;
use App\Http\Resources\DiscussionsResource;
use App\Models\Discussions;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscussionsController extends Controller
{

    private $topic;
    private $discussions;
    public function __construct()
    {
        $this->middleware('auth:api')->except('show');
        $this->topic = new Topic();
        $this->discussions = new Discussions();
    }

    public function show(Request $request)
    {
        
    }

    //删除
    public function destroy(Request $request)
    {
        
    }

    //入库
    public function store(DiscussionsStoreRequest $request)
    {
        $this->discussions->topic_id = $request->topic_id;
        $this->discussions->user_id  = $request->user()->id;
        $this->discussions->body     = $request->body;
        $this->discussions->save();
        return new DiscussionsResource($this->discussions);
    }
}
