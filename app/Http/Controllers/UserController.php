<?php
/*CST256 Milestone 1 Version 1
Vinson Martin 5/20/2022,
User Controller Method that controls login and registration.
Calls Security DAO to access user table*/

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Data\SecurityDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class UserController extends Controller
{
    public function register(Request $request) {
        // Assigning data from fields to variables

        $validated = $request->validate([
            'username' => ['required', 'string','min:2', 'max:255'],
            'firstname' => ['required', 'string','min:2', 'max:255'],
            'lastname' => ['required', 'string','min:2', 'max:255'],
            'email' => ['required', 'string', 'email','min:2', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validated->fails())
        {
            return view('register')
            ->withErrors($validated->errors());
        }
        $firstname = $request->input('firstame');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');

        $user = new UserModel(1, $firstname, $lastname,$email, $username);
        $DAO = new SecurityDAO();
        $DAO->register($user, $password);

        $data = ['id' => $user->getId()  ];

        return view("home")->with($data);
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $DAO = new SecurityDao();
        if ($DAO->login($username, $password)) {
        $user = $DAO->getUserByUsername($username);

            $data = ['id' => $user->getId()  ];

            return view("home")->with($data); }
        $data = ['error' => 1  ];
        return view("login")->with($data);

    }



}
