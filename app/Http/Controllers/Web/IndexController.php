<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SsqModel;

class IndexController extends Controller
{

    /**
     * 首页
     */
    public function index(SsqModel $ssqModel)
    {
        $late = $ssqModel->orderBy('issue','desc')->take(5)->get();
        $rand = $ssqModel->rand(5);
        return view('web.index', [
            'late' => $late,
            'rand' => $rand,
        ]);
    }

}
