<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    private $main_table = 'contact';

    public function index() {
        $contact = DB::table($this->main_table)->first();
        return view('contact', compact('contact'));
    }

    public function update(UpdateContactRequest $request){
        $query = DB::table($this->main_table)->where('id', '=', 1);
        $query->update($request->except('photo', '_token'));

        return redirect()->back();
    }
}
