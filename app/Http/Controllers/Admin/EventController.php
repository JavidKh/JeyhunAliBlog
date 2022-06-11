<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileController;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    private $main_table = 'events';

    public function index() {
        $events = DB::table($this->main_table)->get();
        return view('events', compact('events'));
    }

    public function edit($id) {
        $event = DB::table($this->main_table)->where('id', $id)->first();
        $event->photo = FileController::generateUrl('events', $event->id, 'photo', $event->slug);
        return view('events-edit', compact('event'));
    }

    public function update(EventRequest $request, $id) {
        $query = DB::table($this->main_table)->where('id', $id);
        $query->update($request->except('_token', 'photo'));
        if ($request->has('photo')){
            FileController::deleteFile($query->value('slug'));
            $slug = FileController::add($request, 'events', $query->value('id'), 'photo');
            $query->update(['slug'=>$slug]);
        }

        return redirect()->back();
    }

    public function add(EventRequest $request) {
        $id = DB::table($this->main_table)->insertGetId($request->except('_token', 'photo'));
        $slug = FileController::add($request, 'events', $id, 'photo');
        DB::table($this->main_table)->where('id', $id)->update(['slug' => $slug]);

        return redirect(route('events'));
    }

    public function create() {
        return view('events-create');
    }

    public function delete($id)
    {
        DB::table($this->main_table)->where('id', $id)->delete();

        return redirect()->back();
    }
}
