<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user', 'verified',])->only(['edit', 'update']);
        // //$this->middleware('user')->only('edit', 'update');
        $this->middleware(['auth', 'admin', 'verified'])->except(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'user')->simplePaginate(10);
        return view('admin.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('status','New User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.credit-user', ['user' => $user]);
    }

    /**
     * Credit the user's account banlace.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function creditUser(Request $request, User $user, $id)
    {
       $request->validate([
           'amount' => 'required',
       ]);

       /*
        * Get the user account balance form the users Id
        * Add users account balance to the request amount
       */
       $balance = $user->find($id);
       $acctBalance = $balance->account_balance + $request->amount;

       /* Update the users account balance  */
       $user->Where('id', $id)->update([
           'account_balance'    =>  $acctBalance,
       ]);

       /* Add the transaction to the transaction model */
       $transaction = new Transaction();
       $transaction->amount     = $request->amount;
       $transaction->status     = 'completed';
       $transaction->balance    = $acctBalance;

       $user->find($id)->transactions()->save($transaction);


       return redirect()->route('users.index')->with('status','User Account Credited Successfully');
    }

    public function searchUsers(Request $request)
    {
        $request->validate([
            'search' => ['required', 'regex:/[\a-zA-Z]/'],
        ]);

        $users = User::where('role', 'user')
        ->where('name', 'LIKE', '%'.$request->search.'%')
        ->orderBy('created_at')
        //->orWhere('email', 'LIKE', '%' .$searchInput. '%')
        ->simplePaginate(10);

        return view('admin.search-users', ['users' => $users]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        return view('profile', ['profile' => $user->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $validatedData = $request->validate([
            'name'                    => ['required'],
            'email'                   => ['required'],
            'profile_photo_path'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,jfif', 'max:500'],
        ]);

        /*
            Preparing for resizing and storing
        */

        if($request->hasFile('profile_photo_path')){
             // Get file from request
            $image = $request->file('profile_photo_path');
            // get image file name
            $imageName = $image->getClientOriginalName();
            //Get the image path and Resize
            $imageResize = Image::make($image->getRealPath());
            $imageResize->resize(150,150);
            $imageResize->save(public_path('images/profile/'. $imageName));

            $user->find($id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'profile_photo_path'    => $imageName,
            ]);

            return redirect()->route('profile.edit', $id)->with('status','Profile Updated Successfully');
        }
        else{

        $user->find($id)->update($validatedData);
        return redirect()->route('profile.edit', $id)->with('status','Profile Updated Successfully');

    }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('status','User Deleted Successfully');
    }

    /* Admin profile methods */
    public function editAdmin(User $user, $id)
    {
        return view('admin.profile', ['profile' => $user->find($id)]);
    }


    public function updateAdminProfile(Request $request, User $user, $id)
    {
        $validatedData = $request->validate([
            'name'                    => ['required'],
            'email'                   => ['required'],
            'profile_photo_path'      => ['nullable', 'image', 'mimes:peg,png,jpg,gif,svg', 'max:500'],
        ]);

        /*
            Preparing for resizing and storing
        */

        if($request->hasFile('profile_photo_path')){
             // Get file from request
            $image = $request->file('profile_photo_path');
            // get image file name
            $imageName = $image->getClientOriginalName();
            //Get the image path and Resize
            $imageResize = Image::make($image->getRealPath());
            $imageResize->resize(150,150);
            $imageResize->save(public_path('images/profile/'. $imageName));

            $user->find($id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'profile_photo_path'    => $imageName,
            ]);

            return redirect()->route('admin.profile', $id)->with('status','Profile Updated Successfully');
        }
        else{

        $user->find($id)->update($validatedData);
        return redirect()->route('admin.profile', $id)->with('status','Profile Updated Successfully');

        }

    }
}

