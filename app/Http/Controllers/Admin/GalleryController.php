<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileV2Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    private $main_table = 'photo_gallery';
    public function index() {
        $photos = DB::table($this->main_table)->get();
        foreach ($photos as $photo) {
            $photo->image = FileV2Controller::generateUrl('photo-gallery', 'photo', $photo->slug);
        }
        return view('gallery', compact('photos'));
    }

    public function add(Request $request) {
        $slug = FileV2Controller::add($request, 'photo-gallery', 'photo');
        DB::table($this->main_table)->insert(['slug'=>$slug]);
        return redirect(route('gallery'));
    }

    public function create() {
        return view('gallery-create');
    }

    public function update(Request $request, $id){
        $query = DB::table($this->main_table)->where('id', $id);
        if ($request->has('photo')) {
            FileV2Controller::deleteFile($query->value('slug'));
            $slug = FileV2Controller::add($request, 'photo-gallery', 'photo');
            $query->update(['slug'=>$slug]);
        }

        return redirect()->back();
    }

    public function delete($id) {
        $query = DB::table($this->main_table)->where('id', $id);
        FileV2Controller::deleteFile($query->value('slug'));
        $query->delete();
        return redirect()->back();
    }
}
