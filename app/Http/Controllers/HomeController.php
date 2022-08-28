<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $text="C:/Users/Public";

        // $result = shell_exec("python". " testcompress.py " . escapeshellarg($text));
        
        

        
        
        return view('home');
       
    }


    public function accountsettings()
    {
        return view('accountsettings');
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required ',
            'company_name' => 'required',
            'website_url' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => ['required', 'string', 'min:8'],

        ]);
        $data['password'] = Hash::make($data['password']);
        User::where('id', $user->id)->update(array_merge($data));
        // auth()->user()->product()->update(array_merge($data));

        return redirect('/accountsettings')->with('info', 'Account Settings successfully changed');
    }
}
