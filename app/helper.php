<?php

///For storing image


// if(! function_exists('insert_image')){
//    function insert_image($image_dir,$image)
//    {
//        $destinationPath = public_path($image_dir);
//        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//        $image_file->move($destinationPath, $profileImage);
//        return "$profileImage";
//    }
// }

   function insert_image($image)
   {
      // dd($image);
    $destinationPath = 'customer_image/';
    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $profileImage);
    $input['image'] = "$profileImage";
    return "$profileImage";
   }
   
//   
