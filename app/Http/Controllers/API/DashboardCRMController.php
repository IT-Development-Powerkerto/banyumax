<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inputer;
use App\Http\Resources\OrderResource;

class DashboardCRMController extends Controller
{
    public function order()
    {
        $data = Inputer::orderBy('id');

        return response()->json(OrderResource::collection($data->get()));
    }
}
