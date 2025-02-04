<?php

namespace App\Http\Controllers;

use App\Models\AspectItem;
use Illuminate\Http\Request;

class AspectItemController extends Controller
{
    public function index()
    {
        return AspectItem::all();
    }

}
