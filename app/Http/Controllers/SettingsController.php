<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function profile()
  {
    return view('settings.profile');
  }

  public function editProfile()
  {
    return view('settings.edit-profile');
  }
}
