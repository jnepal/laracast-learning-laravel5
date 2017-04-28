<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {
    
    public function about(){
        $name = 'Jeffery <span style="color:red">Way</span>';
        //return view('pages.about')->with('name', $name);
    
        /*return view('pages.about')->with([
                'first' => 'Jeffrey',
                'last'  => 'way'
                ]);
         * 
         */
        /*
        $data['first'] = 'Jeffrey';
        $data['last']  = 'way';
        return view('pages.about', $data);
         * 
         */
        $first = 'Jeffery';
        $last  = 'way';
        $title = 'About';

        return view('pages.about', compact('first','last', 'title'));
    }
    
    public function contact(){
        $peoples = [];
        /*
         $peoples = [
            'Taylor Otwell',
            'Dayle Rees',
            'Eric Barnes'
        ];
         */
        return view('pages.contact', compact('peoples'));
    }
    

}
