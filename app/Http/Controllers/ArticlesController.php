<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Request;






class ArticlesController extends Controller
{
   public function index()
   {
       $articles = Article::latest()->get();
       
       return view('articles.index', compact('articles'));
   }
   public function show($id)
   {
       
       $article = Article::findorFail($id); //find or fail shows error if null value
       //dd($article); //die show details or null function
       
       return view('articles.show', compact('article'));
   }
   public function create()
   {
       return view('articles.create');
   }
   public function store()
   {
      $input = Request::all();
      $input['published_at'] = Carbon::now();
      
      Article::create($input);
      return redirect('articles');
   }
}
