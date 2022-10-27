<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Content;
use Redirect;

class ContentsController extends Controller
{
    public function edit($content_type){
        $content = Content::where('type', $content_type)->first();;
        return view('admin.content.edit', compact('content', 'content_type'));
    }

    public function update(Request $request, $content_type) {
        $content = Content::where('type', $content_type)->first();;
    }
}
