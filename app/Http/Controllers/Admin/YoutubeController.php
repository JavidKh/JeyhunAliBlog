<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddYoutubeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YoutubeController extends Controller
{
    private $main_table = 'youtube_channel';
    public function index() {
        $links = DB::table($this->main_table)->get();
        return view('youtube', compact('links'));
    }

    public function add(AddYoutubeRequest $request) {
        $id = DB::table($this->main_table)->insertGetId($request->except('_token', 'photo'));

        return redirect(route('youtube'));
    }

    public function create() {
        return view('youtube-create');
    }

    public function delete($id) {
        DB::table($this->main_table)->where('id', $id)->delete();

        return redirect()->back();
    }
}
