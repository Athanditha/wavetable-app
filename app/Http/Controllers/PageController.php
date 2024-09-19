<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
 public function welcome()
 {
 return view('customer.welcome');
 }
 public function customer()
 {
 return view('custmgmt.custmain');
 }
 public function oops()
 {
 return view('customer.oops');
 }
 public function items()
 {
 return view('items.itemview');
 }
 public function home()
 {
 return view('customer.home');
 }
 public function custlogin()
 {
 return view('auth.login');
 }
 public function admin()
 {
 return view('adminlanding.admin');
 }
 public function adminlogin()
 {
 return view('logins.adminlogin');
 }
 public function custregister()
 {
 return view('auth.register');
 }
}
