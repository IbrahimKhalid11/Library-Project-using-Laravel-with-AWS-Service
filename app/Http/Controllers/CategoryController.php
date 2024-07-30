<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // read all

    public function all(){

        $categories=Category::all();

        return view("Categories.all")->with("categories",$categories);
        // dd($categories);
    }

    public function show($id){
        $category=Category::findOrFail($id);

        return view('Categories.show')->with('category',$category);
        }

        public function create(){
            return view("Categories.create");
        }
        public function store(Request $request){
            //  catch
            // echo $request->name;
            // validation
            $request->validate([

                "name"=>"required|string|max:50",
                "subject"=>"required|string",
                "year"=>"required|string",
                "price"=>"required|numeric",
                "number"=>"required|numeric",
            ]);
            // store
            Category::create([
                "Name"=>$request->name,
                "Subject"=>$request->subject,
                "Year"=>$request->year,
                "Number"=>$request->number,
                "Price"=>$request->price,
            ]);
            // redirect
            $categories=Category::all();
            return view("Categories.all")->with("categories",$categories);

            // or to route
            // return redirect(url("categories"));

            // or method
            // return redirect()->action([CategoryController::class],"all");


        }

}
