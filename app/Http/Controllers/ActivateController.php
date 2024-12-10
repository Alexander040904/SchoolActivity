<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ActivateController extends Controller
{
    //
    public function index($activate)
    {

        $rol = Role::find(2);
        $activeUsers = $rol->users()
            ->where('is_active', $activate)
            ->get(['id', 'name']);


        return redirect()->route('dashboard', ['source' => $activate])->with('activeUsers', value: $activeUsers);

    }
    public function activate($id){
        $user = User::find($id);
        $user->is_active = 1; // Esto funciona incluso si 'is_active' no está en $fillable
        $user->save();
        return redirect()->route('activation', 2);

    }
    public function deactivate($id){
        $user = User::find($id);
        $user->is_active = 2; // Esto funciona incluso si 'is_active' no está en $fillable
        $user->save();
        return redirect()->route('activation', 1);

    }
}
