<?php

namespace App\Actions;
use App\Models\Tag;
use Illuminate\Http\Request;


class  StoreTagAction
{
    public function execute(Request $request):void

    {
           
        $request->validate([
            'tag_name'=>'required|max:20|unique:tags',
        ]);
        $input=$request->all();
        Tag::create($input);
        
    }


}