<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CalendarController extends Controller
{
    public function index(Request $request): View
    {
        $requestId = $request->getPathInfo();

        Log::info('Пользователь: {name} зашёл на эту страницу: {requestId}', [
            'name' => auth()->user()->name,
            'requestId' => $requestId]);

        $title = 'Calendar';

        return view('admin.calendar.index', compact('title'));
    }
}
