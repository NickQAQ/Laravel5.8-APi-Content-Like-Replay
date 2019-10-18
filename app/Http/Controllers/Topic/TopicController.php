<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicCollection;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show']);
    }

    public function index()
    {
        $topics = Topic::paginate(2);

        return new TopicCollection($topics);
    }
    
    
    public function show(Topic $topic,Request $request)
    {
        //为什么这样就直接查询了？？？
        $result = $request->topic;


        return new TopicResource($result);
    }

    public function store(StoreTopicRequest $request)
    {
//        $user = new User();
//        dd($user->ownsTopic(11));
        $result = Topic::create([
            'user_id'   => $request->user()->id,
            'title'     => trim($request->title),
            'content'   => $request->topic_content
        ]);
        if ($result){
            return response()->json([
                'message'   => '创建成功',
                'data' => new TopicResource($result)
            ],201);
        }
        return response()->json([
            'msg' => '服务器错误 创建失败'
        ],400);
    }



    public function edit(Topic $topic)
    {
        //
    }


    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //todo 此处有问题 具体问题在User Model 中的ownsTopic 详注
        //只有话题的创建者才能修改内容 其他的用户无法对话题进行修改  ---授权和鉴权--
        $this->authorize('update',$topic);
        $topic->title   = $request->title;
        $topic->content = $request->topic_content;
        $topic->user_id = $request->user()->id;
        $topic->where('id',$request->topice)->update($topic);
        return new TopicResource($topic);
    }


    public function destroy(Topic $topic,Request $request)
    {
        $this->authorize('delete',$topic);

        $topic->where('id',$request->topic)->delete();

        return response()->json(null,204);
    }
}
