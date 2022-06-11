<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public $main_table = 'offers';
    public function index() {
        $offers = DB::table($this->main_table)->get();
        return view('offers', compact('offers'));
    }

    public function edit($id) {
        $offer = DB::table($this->main_table)->where('id', $id)->first();
        return view('offers-edit', compact('offer'));
    }

    public function update(OfferRequest $request, $id) {
        $query = DB::table($this->main_table)->where('id', $id);
        $query->update($request->except('_token'));

        return redirect()->back();
    }

    public function add(OfferRequest $request) {
        $id = DB::table($this->main_table)->insertGetId($request->except('_token', 'photo'));

        return redirect(route('offers'));
    }

    public function create() {
        return view('offers-create');
    }

    public function delete($id) {
        DB::table($this->main_table)->where('id', $id)->delete();

        return redirect()->back();
    }
}
