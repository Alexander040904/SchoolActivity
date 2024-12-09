<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class ActivateController extends Controller
{
    //
    public function index($activate)
    {

        if ($activate) {
            $rol = Role::find(2);
            $activeUsers = $rol->users()
                ->where('is_active', $activate)
                ->get(['role_id', 'name']);

return redirect()->route('dashboard')->with('activeUsers', value: $activeUsers);

                
        }
        $rol = Role::find(2);
        $activeUsers = $rol->users()
            ->where('is_active', $activate)
            ->get(['role_id', 'name']);
          

            return redirect()->route('dashboard')->with('activeUsers', $activeUsers);

    }
}
