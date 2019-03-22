<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function getLang($locale)
    {
        session(['locale'=>$locale]);
        return redirect()->back();
    }
}
