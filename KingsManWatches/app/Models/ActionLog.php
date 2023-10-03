<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ActionLog extends Model
{
    public function get(Request $request) {
        $query = \DB::table("action_logs as al")
            ->join('users as u', 'al.user_id', '=', 'u.id')
            ->select(['al.*', 'u.username']);

        if($request->has('from') && $request->get('from'))
            $query = $query->where('al.created_at', '>=', $request->get('from'));

        if($request->has('to') && $request->get('to'))
            $query = $query->where('al.created_at', '<=', $request->get('to'));

        return $query->paginate(5);
    }

    public function insert($ip, $path, $method, $action, $user_id = null) {
        \DB::table("action_logs")->insert([
            "ip" => $ip,
            "path" => $path,
            "method" => $method,
            "action" => $action,
            "user_id" => $user_id,
            "created_at" => now()
        ]);
    }

    public function getRegistrationsCount() {
        return \DB::table('action_logs')
            ->where('path', 'register')
            ->where('method', 'POST')
            ->where('action', 'User registered themselves.')
            ->count();
    }
}
