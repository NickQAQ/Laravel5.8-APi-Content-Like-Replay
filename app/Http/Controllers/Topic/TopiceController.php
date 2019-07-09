<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Models\Topice;
use Illuminate\Http\Request;

class TopiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request)
    {
        $result = Topice::create([
            'title'     => $request->title,
            'content'   => $request->title_content
        ]);
        if ($result){
            return response()->json([
                'msg' => '创建成功',
                'title' => $request->title
            ],201);
        }
        return response()->json([
            'msg' => '服务器错误 创建失败'
        ],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topice  $topice
     * @return \Illuminate\Http\Response
     */
    public function show(Topice $topice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topice  $topice
     * @return \Illuminate\Http\Response
     */
    public function edit(Topice $topice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topice  $topice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topice $topice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topice  $topice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topice $topice)
    {
        //
    }
}
