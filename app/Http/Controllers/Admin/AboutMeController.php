<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileV2Controller;
use App\Http\Requests\UpdateAboutMeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutMeController extends Controller
{
    private $main_table = 'about_me';

    public function index() {
        $about_me = DB::table($this->main_table)->first();
        $about_me->photo = FileV2Controller::generateUrl('about-me', 'photo', $about_me->slug);
        return view('about-me', compact('about_me'));
    }

    public function update(UpdateAboutMeRequest $request){
        $query = DB::table($this->main_table)->where('id', '=', 1);
        $query->update($request->except('photo', '_token'));
        if($request->has('photo')) {
            FileV2Controller::deleteFile($query->value('slug'));
            $slug = FileV2Controller::add($request, 'about-me', 'photo');
            $query->update(['slug'=>$slug]);
        }
        return redirect()->back();
    }
}
