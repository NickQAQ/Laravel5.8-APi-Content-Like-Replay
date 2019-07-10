<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicCollection;
use App\Http\Resources\TopicResource;
use App\Models\Topice;
use Illuminate\Http\Request;

class TopiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show']);
      //  $this->authorizeResource(Topice::class);
    }

    public function index()
    {
        $topics = Topice::paginate(2);

        return new TopicCollection($topics);
    }
    
    
    public function show(Topice $topice,Request $request)
    {
        $id = $request->topic;
        $result = $topice::where('id',$id)->first();
        return response()->json([
            'data' => new TopicResource($result)
        ],200);
    }

    public function store(StoreTopicRequest $request)
    {
        $result = Topice::create([
            'user_id'   => $request->user()->id,
            'title'     => trim($request->title),
            'content'   => $request->topic_content
        ]);
        if ($result){
            return response()->json([
                'msg'   => '创建成功',
                'data' => new TopicResource($result)
            ],201);
        }
        return response()->json([
            'msg' => '服务器错误 创建失败'
        ],400);
    }



    public function edit(Topice $topice)
    {
        //
    }


    public function update(UpdateTopicRequest $request, Topice $topice)
    {
        //只有话题的创建者才能修改内容 其他的用户无法对话题进行修改  ---授权和鉴权--
        $this->authorize('update',$topice);

        $topice->title = $request->title;
        $topice->content = $request->topic_content;
        $topice->save();
        return new TopicResource($topice);
    }


    public function destroy(Topice $topice)
    {
        //
    }
}
