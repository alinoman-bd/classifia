<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Hash;
use App\Chat;
use Auth;
use Validator;
use DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      return view('admin.home');
    }
    public function createSuperAdmin()
    {
      $data = Admin::orderBy('admins.id','desc')->where('role', 2)->get();
      return view('admin.create-super-admin',compact('data'));
    }
  }