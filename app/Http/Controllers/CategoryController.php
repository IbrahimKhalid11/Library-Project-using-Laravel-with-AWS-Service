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

        public function create()
        {
            // Fetch all categories to populate the dropdown
            $categories = Category::all();
            return view('Categories.create', compact('categories'));
        }

        public function store(Request $request)
        {
            // Validate the request
            $request->validate([
                'number' => 'required|integer|min:1',
                'price' => 'nullable|integer|min:0',
            ]);

            if ($request->filled('existingCategory')) {
                // Update existing category
                $category = Category::find($request->input('existingCategory'));
                $category->increment('Number', $request->input('number'));

                $categoryDetails = [
                    'name' => $category->Name,
                    'subject' => $category->Subject,
                    'year' => $category->Year,
                    'price' => $category->Price,
                    'number' => $request->input('number')
                ];

                return redirect()->back()->with('success', $categoryDetails);
            } else {
                // Validate the request for new category
                $request->validate([
                    'name' => 'required|string|max:50',
                    'subject' => 'required|string|max:50',
                    'year' => 'required|string|max:50',
                ]);

                // Check if a category with the same name, subject, and year already exists
                $existingCategory = Category::where('Name', $request->input('name'))
                    ->where('Subject', $request->input('subject'))
                    ->where('Year', $request->input('year'))
                    ->first();

                if ($existingCategory) {
                    return redirect()->back()->withErrors(['error' => 'Category with the same name, subject, and year already exists.']);
                }

                // Create new category
                $category = Category::create([
                    'Name' => $request->input('name'),
                    'Subject' => $request->input('subject'),
                    'Year' => $request->input('year'),
                    'Number' => $request->input('number'),
                    'Price' => $request->input('price'),
                ]);

                $categoryDetails = [
                    'name' => $category->Name,
                    'subject' => $category->Subject,
                    'year' => $category->Year,
                    'price' => $category->Price,
                    'number' => $category->Number
                ];

                return redirect()->back()->with('success', $categoryDetails);
            }
        }

        public function getCategoryPrice($id)
        {
            $category = Category::find($id);
            return response()->json(['price' => $category->Price]);
        }

        public function editList()
        {
            $categories = Category::all();
            return view('Categories.editList', compact('categories'));
        }

        public function edit($id)
        {
            $category = Category::findOrFail($id);
            return view('Categories.edit', compact('category'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:50',
                'subject' => 'required|string|max:50',
                'year' => 'required|string|max:50',
                'number' => 'required|integer|min:1',
                'price' => 'required|integer|min:0',
            ]);

            $category = Category::findOrFail($id);
            $category->update([
                'Name' => $request->input('name'),
                'Subject' => $request->input('subject'),
                'Year' => $request->input('year'),
                'Number' => $request->input('number'),
                'Price' => $request->input('price'),
            ]);

            return redirect()->route('categories.editList')->with('success', 'Category updated successfully!');
        }

        public function destroy($id)
        {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.editList')->with('success', 'Category deleted successfully');
        }
}
