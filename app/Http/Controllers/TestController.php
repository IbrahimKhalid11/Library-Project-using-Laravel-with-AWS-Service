<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function all($x,$y) {
        echo "all";
        $fullname="$x $y";
        return view('all')->with("Fullname",$fullname);
    }
}
