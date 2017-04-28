<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;


class TagsController extends Controller {

    //Uses Route Model Binding
	public function show(Tag $tag){
        return "Hello World";
        $articles =  $tag->articles()->published()->get();

        //return view('articles.show', compact('articles'));
    }

}
