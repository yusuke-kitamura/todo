<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function create(){
    	return view('folders/create');
    }

    public function store(CreateFolder $request){
    	// 空のインスタンスを生成
    	$folder = new Folder();
    	// タイトルを取得
    	$folder->title = $request->title;
    	// 保存
    	$folder->save();
    	return redirect()->route('tasks.index',
    	['id' => $folder->id,]);
    }
}
