<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class UserActivityLogController extends Controller
{
    public function index()
    {
       $logDetails = ActivityLog::with('user')->where('user_id',auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('activitylogs.index', compact('logDetails'));
    }

}
