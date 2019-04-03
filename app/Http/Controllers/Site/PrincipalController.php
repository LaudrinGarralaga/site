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
        $produtos = Produto::paginate(8);

        return view ('site.index', compact('produtos'));
    }
}
