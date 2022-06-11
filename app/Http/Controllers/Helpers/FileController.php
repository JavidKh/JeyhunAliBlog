<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FileController extends Controller
{
    static function add(Request $request, $object, $object_id, $item)
    {
        try {
            if ($request->hasFile($item)) {
                $file = $request->file($item);
                $filenameWithExtension = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $generatedFileName = md5($filenameWithExtension . time()) . '.' . $extension;

                if ($file->storeAs('uploads/' . $object . '/' . $object_id . '/' . $item . '/', $generatedFileName)) {
                    DB::table('files')->insert([
                        'object' => $object,
                        'object_id' => $object_id,
                        'item' => $item,
                        'slug' => $generatedFileName,
                    ]);
                    return $generatedFileName;
                } else {
                    return false;
                }
            }
        } catch (\Exception $exception) {
            return parent::asJson($exception->getMessage());
        }
    }

    static function showFile($object, $id, $item, $slug, $file_type = ['content-type' => 'image/jpeg'])
    {
        try {
            $file = Storage::disk('local')->get('uploads/' . $object . '/' . $id . '/' . $item . '/' . $slug);
            return response()->make($file, 200, $file_type);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    static function generateUrl($object, $id, $item, $slug)
    {
        return URL::to('/') . '/show-file/' . $object . '/' . $id . '/' . $item . '/' . $slug;
    }

    static function deleteFile($slug)
    {
        try {
            $file = DB::table('files')->where('slug', $slug)->first();
            $file_path = 'uploads/' . $file->object . '/' . $file->object_id . '/' . $file->item . '/';
            Storage::delete($file_path . $slug);
            DB::table('files')->where('slug', $slug)->delete();

            //Removing directories if empty
            $files_at_directory = Storage::allFiles($file_path);
            if (!count($files_at_directory)) {
                Storage::deleteDirectory($file_path);
            }

            $file_path = 'uploads/' . $file->object . '/' . $file->object_id . '/';
            $files_at_directory = Storage::allFiles($file_path);
            if (!count($files_at_directory)) {
                Storage::deleteDirectory($file_path);
            }

            $file_path = 'uploads/' . $file->object . '/';
            $files_at_directory = Storage::allFiles($file_path);
            if (!count($files_at_directory)) {
                Storage::deleteDirectory($file_path);
            }

            return true;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
