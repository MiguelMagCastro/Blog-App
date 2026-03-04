<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $userChirps = Chirp::with('chirps')
            ->latest()
            ->take(50)
            ->where("user_id", $userId)
            ->get();

        return view('home', ['chirps' => $userChirps]);
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
    public function show(User $user)
    {
        $chirps = $user->chirps()->latest()->get();

        $followersCount = $user->followers()->count();

        $followingCount = $user->following()->count();

        $isFollowing = auth()->check()
            ? $user->followers()->where('follower_id', auth()->id())->exists()
            : false;

        return view('users.profile', [
            'user' => $user,
            'chirps' => $chirps,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
            'isFollowing' => $isFollowing,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('name', 'like', "%{$search}%")->get();

        return view('users.search', compact('users', 'search'));
    }



    public function follow(User $user)
    {
        $authUser = auth()->user();

        if ($authUser->id === $user->id) {
            return back();
        }

        $user->toggleFollow(auth()->user());

        return back();
    }




}
