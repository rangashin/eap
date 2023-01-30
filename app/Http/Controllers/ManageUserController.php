<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereNot(function ($query){
            $query->where('role_id', Role::IS_SECRETARY);
        })->latest('id')->with('role')->paginate(50);
        return view('admin.user-index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'contactno' => $request->contactno,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);
        
        $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));
                $message = $twilio->messages->create(
                    "+639615210310",
                    array(
                        "from" => config('twilio.from'),
                        "body" => "SAMPLE TEST"
                    )
                );
        
        return redirect()->route('admin.user.index')->with('success', 'User Has Been Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user-show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'contactno' => $request->contactno,
        ]);

        return redirect()->route('admin.user.index')->with('success', $user->username.' Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $username = $user->username;
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', $username.'  Has Been Deleted.');
    }
}
