<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;

class TaskController extends Controller
{
	public function index(int $id){
		// すべてのフォルダーを取得
		$folders = Folder::all();
		//フォルダーを取得
		$current_folder = Folder::find($id);
		// 選ばれたフォルダーに紐づくタスクを取得
		$tasks = $current_folder->tasks()->get();
		return view('tasks.index',[
			'folders' => $folders,
			'current_folder_id' => $current_folder->id,
			'tasks'=>$tasks]);
	}

	public function create(int $id){
		return view('tasks/create',['folder_id' => $id]);
	}

	public function store(int $id, CreateTask $request){
		// 現在のフォルダを取得
		$current_folder = Folder::find($id);
		// 空のタスクインスタンスを生成し、リクエストを取得
		$task = new Task();
		$task->title = $request->title;
		$task->due_date = $request->due_date;
		// 現在のフォルダに生成したタスクを保存
		$current_folder->tasks()->save($task);
		return redirect()->route('tasks.index',['id' => '$current_folder->id']);
	}

}
