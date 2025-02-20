<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function logs()
    {
        $logs = Log::all(); // Assuming logs are stored in the database
        return response()->json($logs, 200);
    }
}
