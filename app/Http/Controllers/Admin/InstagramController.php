<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddInstagramRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstagramController extends Controller
{
    private $main_table = 'instagram';
    public function index() {
        $links = DB::table($this->main_table)->get();
        return view('instagram', compact('links'));
    }

    public function add(AddInstagramRequest $request) {
        $id = DB::table($this->main_table)->insertGetId($request->except('_token', 'photo'));

        return redirect(route('instagram'));
    }

    public function create() {
        return view('instagram-create');
    }

    public function delete($id) {
        DB::table($this->main_table)->where('id', $id)->delete();

        return redirect()->back();
    }
}
