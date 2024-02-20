<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user(); 
        $files = $request->file('files');
        $project_name = $request->file('project_name');
        // Validate the uploaded file
        $request->validate([
            'files.*' => 'required|file|max:10240', // Maximum file size of 10MB
        ]);

        foreach($files as $file){
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/'.$user->id.'/'.$project_name, $filename); // This will store the file in the storage/app/uploads directory
        }

    
        return view('uploaded');
    }
}
