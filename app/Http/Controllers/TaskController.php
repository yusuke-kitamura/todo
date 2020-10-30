<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
	public function index(int $id){
		// すべてのフォルダーを取得
		$folders = Folder::all();
		//フォルダーを取得
		$current_folder = Folder::find($id);
		// 選ばれたフォルダーに紐づくタスクを取得
		$tasks = Task::where('folder_id', $current_folder->id)->get();
		return view('tasks.index',[
			'folders' => $folders,
			'current_folder_id' => $current_folder->id,
			'tasks'=>$tasks]);
	}

}
