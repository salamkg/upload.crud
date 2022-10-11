<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Validator;

class FileController extends Controller
{
    public function fileUpload(Request $request)
    {
        try {
            //Validate file
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:xml,xls,xlsx,csv',
            ]);

            //If Validate fails return validation error
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            //Store file
            $filename = time(). '.' . $request->file('file')->extension();
            $request->file('file')->storeAs('uploads/', $filename);

            File::create([
                'file' => $request->file('file'),
                'title' => $request->title
            ]);

            return response()->json([
                        "success" => true,
                        "message" => "Successfully uploaded",
                        "file" => $request->all()
                    ]);
        } catch (\Exception $error) {
                return $error->getMessage();
        }
        return $request->all();
    }

    public function fileEdit($id, Request $request)
    {
        $file = File::find($id);
        $file->update($request->all());

        return response()->json([
            'file' => $file
        ]);
    }

    public function fileUpdate(Request $request, $id)
    {
        $file = File::find($id);

        $file->fill($request->all());
        $file->save();
        
        return response()->json([
            "success" => true,
            "message" => "Successfully updated",
            "file" => $file
        ]);
    }

    public function deleteFile($id)
    {
        try {
            File::find($id)->remove();

            return response()->json([
                'message' => 'Successfully deleted'
            ]);
        } catch (\Exception $error) {
            return $error->getMessage();
        }
        
    }

    public function getFiles()
    {
        try {
            $files = File::get()->all();

            return response()->json([
                'files' => $files
            ]);
        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }

    public function getFile($id)
    {
        try {
            $file = File::find($id);

            return response()->json([
                'file' => $file
            ]);
        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }
}
