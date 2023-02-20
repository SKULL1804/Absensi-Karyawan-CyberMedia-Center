<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function show()
    {
        $id = request('id');
        return Permission::findOrFail($id);
    }
}
