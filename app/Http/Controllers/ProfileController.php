<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id){
        $data = Admin::find($id);
        return view('backend\pages\admins\profile',compact('data'));

    }
}
