<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view("Main.main");
    }

    public function invoice()
    {
        // Exclude categories where the Number is zero
        $categories = Category::where('Number', '>', 0)->select('Name')->distinct()->get();
        return view('Main.invoice', compact('categories'));
    }

    public function displayInvoice(Request $request)
    {
        $categories = $request->input('categories');
        $totalPrice = 0;

        foreach ($categories as $category) {
            $discount = $category['Discount'] / 100;
            $newPrice = $category['Price'] * $category['Number'] * (1 - $discount);
            $totalPrice += $newPrice;

            // Update the number in the database
            Category::where('Name', $category['Name'])
                ->where('Subject', $category['Subject'])
                ->where('Year', $category['Year'])
                ->decrement('Number', $category['Number']);
        }

        // Save the invoice
        $invoiceData = [
            'categories' => json_encode($categories),
            'total_price' => $totalPrice,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $invoiceId = DB::table('invoices')->insertGetId($invoiceData);

        return view('Main.display_invoice', compact('categories', 'totalPrice', 'invoiceId'));
    }



    public function getSubjects(Request $request)
    {
        $name = $request->query('name');
        $subjects = Category::where('Name', $name)->where('Number', '>', 0)->select('Subject')->distinct()->get();
        return response()->json($subjects);
    }

    public function getYears(Request $request)
    {
        $name = $request->query('name');
        $subject = $request->query('subject');
        $years = Category::where('Name', $name)->where('Subject', $subject)->where('Number', '>', 0)->select('Year')->distinct()->get();
        return response()->json($years);
    }

    public function getPrice(Request $request)
    {
        $name = $request->query('name');
        $subject = $request->query('subject');
        $year = $request->query('year');
        $category = Category::where('Name', $name)->where('Subject', $subject)->where('Year', $year)->where('Number', '>', 0)->first();
        return response()->json($category->Price);
    }


    public function invoiceHistory()
    {
        $invoices = DB::table('invoices')->select('id', 'categories', 'total_price', 'created_at')->get();
        return view('Main.invoice_history', compact('invoices'));
    }



}
