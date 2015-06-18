<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
            
            $people = [
                'Adam C', 'Tara C'
                ];
                
            $first = 'Adam';
            $last= 'Calihman';
            return view('pages/about', compact('people', 'first', 'last'));
    }
    
    public function contact()
    {
        return view('pages/contact');
    }
}
