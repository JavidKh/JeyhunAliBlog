<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileController;
use App\Http\Requests\WorkHistoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkHistoryController extends Controller
{
    private $main_table = 'work_history';
    public function index() {
        $work_history = DB::table($this->main_table)->get();
        return view('work-history', compact('work_history'));
    }

    public function edit($id) {
        $work_history = DB::table($this->main_table)->where('id', $id)->first();
        return view('work-history-edit', compact('work_history'));
    }

    public function update(WorkHistoryRequest $request, $id) {
        $query = DB::table($this->main_table)->where('id', $id);
        $query->update($request->except('_token'));

        return redirect()->back();
    }

    public function add(WorkHistoryRequest $request) {
        $id = DB::table($this->main_table)->insertGetId($request->except('_token', 'photo'));

        return redirect(route('work_history'));
    }

    public function create() {
        return view('work-history-create');
    }

    public function delete($id) {
        DB::table($this->main_table)->where('id', $id)->delete();

        return redirect()->back();
    }
}
