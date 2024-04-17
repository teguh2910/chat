<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', function (){
    return view('dashboard',
        [
            'users' => User::where('id', '!=', Auth::id())->get(),
        ]);
    })
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/chat/{user}',\App\Livewire\Chat::class)->name('chat');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
