<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $data;
    protected $actionLogModel;

    public function __construct() {
        $this->actionLogModel = new ActionLog();
    }

    protected function logAction($action, Request $request, $user_id = null) {
        $ip = $request->ip();
        $path = $request->path();
        $method = $request->method();
        $user_id = $request->session()->has("user") ? $request->session()->get("user")->id : $user_id;

        try {
            $this->actionLogModel->insert($ip, $path, $method, $action, $user_id);
        } catch(\Exception $ex) {
            \Log::error($ex->getMessage());
        }
    }
}
