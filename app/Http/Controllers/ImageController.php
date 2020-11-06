<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
    public function update(Request $request,$id)
    {
        
        $data = array();
        $image = $request->file('photo');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'financeph_frontend/src/photodatabase/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['photo'] = $image_url;
            $product = DB::table('users')->where('id',$id)->update($data);
            return 'Upload Successful';

            
        }
    }
}
