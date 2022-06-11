<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    private $main_table = 'links';
    public function index() {
        $links = (object)[];
        $platforms = $this->getPlatforms();
        foreach ($platforms as $platform){
            $links->$platform = $this->getUrl($platform);
        }

        return view('links', compact('links'));
    }

    private function getUrl($platform){
        $url = DB::table($this->main_table)->where('name', '=', $platform)->value('url');

        return $url;
    }

    public function update(Request $request) {
        $platforms = $this->getPlatforms();

        foreach ($platforms as $platform) {
            DB::table($this->main_table)->where('name', $platform)->update(['url'=>$request->input($platform)]);
        }
        return redirect()->back();
    }

    private function getPlatforms() {
        $platforms = DB::table($this->main_table)->pluck('name');

        return $platforms;
    }
}
