<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Request;
use App\Tag;
class ArticlesController extends Controller {

        public function __construct(){
           $this->middleware('auth', ['only' => 'create']);//we could also use except
        }

        public function index(){


            //Retrieves All Articles
            //$articles = Article::all();
            
            //Retrieves Articles Latest First
            //$articles = Article::latest('published_at')->get();
            
            //There is also method for finding oldest
            //$articles = Article::oldest('published_at')->get();
            
            //Retrieves Article scheduled to today
            //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
            
            //Using Eloquent Model Scope to do the same tasks as above
            //Retrieving Article (using where clause)
            $articles = Article::latest('published_at')->published()->get();
            
            $title    = "Articles";
            
            return view('articles.index', compact('articles', 'title'));
        }
        
        /*
         * Not Using Route Binding
         * Route Binding is useful for API
         * and Small Project
         */

//        public function show($id){
//            $article = Article::findOrFail($id);
//            $title =  $article->title;
//            //dd($article);
//            /**
//            if(is_null($article)){
//                abort(404);
//            }
//             *
//             */
//            //Accessing Property of a Carbon Object
//            //dd($article->created_at);
//            //dd($article->created_at->year);
//            //dd($article->created_at->month);
//            //dd($article->created_at->addDays(8));
//            //dd($article->created_at->format('Y-m'));
//            //dd($article->created_at->diffForHumans());
//
//            //return view('articles.show', compact('article', 'title'));
//        }
        /**
         *Using Route Binding
         * @param Article $article
         * @return mixed
        */
        public function show(Article $article){

            $title = $article->title;

            return view('articles.show', compact('article', 'title') );
        }

        public function create(){
            /**
             * Only Allowing Authentic Users to View
             * the Create Article Form
             */
            /*if(Auth::guest()){
                return redirect('articles');
            }*/
            //Tag::lists('name') will return array of values of the column name for table tag
            //Tag::lists('name', 'id' ) will return associative array of column name as value and column id as key from table tag
            $tags  = Tag::lists('name', 'id');
            $title = 'Create Article';

            return view('articles.create', compact('title', 'tags'));
        }
        /**
         * Validation Using CreateArticleRequest
         * @param CreateArticleRequest $request
         * @return type
         */
        
        public function store(ArticleRequest $request){
            //$title = Request::get('title');
            //$body  = Request::get('body');
            
            //Using Facade Request
            //$input   = Request::all();
            //$input['published_at'] = Carbon::now(); 
            
            //$title   = $input['title'];
            
            /*
             * $article        = new Article;
             * $article->title = $input['title'] || Request::get('title');
             * $article->body  = $input['body'] || Request::get('body');
             * $article->save();
             * 
             */
            
            
            /**
             * Article::Create(['title' => $title, 'body' => $body]);
             */
        
            //since We are passing the Request via CreateArticleRequest,
            //We no longer need to use HtmlFacade
            //Article::create(Request::all());
            
            //instead

            //$request = $request->all();
            //$request['user_id'] = Auth::user()->id;

            //Article::create($request->all());


           //Not Having Tag Id
            /*$article = new Article($request->all());

            Auth::user()->articles()->save($article);*/

            //Having Tag Id
            $article = Auth::user()->articles()->create($request->all());
            $tagsIds = $request->input('tag_list');
            $article->tags()->attach($tagsIds);

            /*//Could also do as
            //Session::flash('flash_message', 'Your Article has Been Created');
            session()->flash('flash_message', 'Your Article has Been Created');
            session()->flash('flash_message_important', true);


            return redirect('articles');*/

            //Flash Message Could be Entirely be done as

            return redirect('articles')->with([
                'flash_message'           => 'Your Article has been Created',
                'flash_message_important' => true
            ]);
            
        }
        
        
        //Without Using Route Binding
        /*public function edit($id){

            $article = Article::findOrFail($id);
            $title =  "Edit ".$article->title;

            return view('articles.edit', compact('article', 'title'));
        }*/

        //Using Route Binding
        public function edit(Article $article){
            $tags = Tag::lists('name', 'id');
            $title = $article->title;

            return view('articles.edit',compact('article', 'title', 'tags'));
        }

        //Without Validation and without Using Route Binding
        /**
        public function update($id,  \Illuminate\Http\Request $request){
            $article = Article::findOrFail($id);
            
            $article->update($request->all());
            
            return redirect('articles');
        }
         * 
         */

        //With Validation and without Using Route Binding
        /*public function update($id, ArticleRequest $request){

            $article = Article::findOrFail($id);

            $article->update($request->all());

            return redirect('articles');
        }*/

        //With Validation and Using Route Binding

        public function update(Article $article, ArticleRequest $request){
            $article->update($request->all());

            $article->tags()->sync($request->input('tag_list'));

            return redirect('articles');
        }
        

}
