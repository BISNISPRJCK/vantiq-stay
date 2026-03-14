<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    public function index()
    {
        $categories = RoomCategory::all();

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }
}
