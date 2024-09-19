<?php

namespace App\Http\Controllers;
use App\Models\Item;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()->usertype=='admin')
        {
            return view('adminlanding.admin');
        }
        else
        {
            return view('customer.welcome');
        }
    }

    public function items(){
        $items = Item::all();
        return view('items.itemview', compact('items'));
    }

    public function customer(){
        $items = Item::all();
        return view('custmgmt.custmain', compact('customers'));
    }
    
    
}
