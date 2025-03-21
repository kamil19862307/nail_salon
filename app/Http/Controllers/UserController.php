<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $title = 'Профиль пользователя';

        return view('admin.users.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFormRequest $request, User $user)
    {
        // remove nulls
        $incomingData = array_filter($request->validated());

        if (!empty($incomingData['avatar'])){
            $avatarName = $incomingData['name'] ?? $user->name;

            $avatarFullName = Str::slug($avatarName, '_') . '.' . $incomingData['avatar']->extension();

            $incomingData['avatar']->storeAs('images/admin/avatars', $avatarFullName, 'public');

            $incomingData['avatar'] = $avatarFullName;
        }

        $user->update($incomingData);

        return to_route('admin.users.edit', $user)->with('success', 'Пользователь успешно изменён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
