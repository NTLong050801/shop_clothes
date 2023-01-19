<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Services\Menu\UploadService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    protected $upLoad;

    public function __construct(UploadService $upLoad)
    {
        $this->upLoad = $upLoad;
    }

    public function store(Request $request)
    {

        $url = $this->upLoad->store($request);
        if ($url != false) {
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
