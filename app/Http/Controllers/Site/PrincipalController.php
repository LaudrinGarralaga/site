<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;

class PrincipalController extends Controller
{
    public function index()
    {
        //$produtos = Produto::All();
       
        if(request()->sort == ('low_high')) {
            
            $produtos = Produto::orderBy('val_avista')->paginate(12);
           
            
        } elseif (request()->sort == ('high_low')) {
            $produtos = Produto::orderBy('val_avista', 'desc')->paginate(12);

        } else {
            $produtos = Produto::paginate(12);
        }

        return view ('site.index', compact('produtos'));
    }

}
