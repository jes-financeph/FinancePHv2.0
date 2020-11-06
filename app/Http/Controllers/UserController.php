<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
    {
      return User::all();
    }

    public function store(Request $request)
    {
      return User::create($request->all());
    }

    public function show($id)
    {
      return User::find($id);
    }

    public function update(Request $request, $id)
    {
      $Variable = User::find($id);
      $Variable->update($request->all());
      return $Variable;
    }

    public function destroy($id)
    {
      return User::destroy($id);
    }
}
