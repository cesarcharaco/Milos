<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        //event(new Registered($user = $this->create_user($request->all())));
        $user = $this->create_user($request->all());
        //dd($user);
        //$this->guard()->login($user);
        //$this->registered($request, $user);
        flash('<i class="icon-circle-check"></i> Usuario registrado con satisfactoriamente!')->success()->important();
        return redirect()->to('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validatorUpdate($request->all())->validate();
        $buscar=User::where('email',$request->email)->where('id','<>',$id)->get();
        if (!empty($buscar)) {
            if (count($buscar)>0) {
                flash('<i class="icon-circle-check"></i> El correo ya esta en uso!')->warning()->important();
                    return redirect()->to('users');
            } else {
                
                $user=User::find($id);
                $user->name=$request->name;
                $user->email=$request->email;
                $user->user_type=$request->user_type;
                $user->status=$request->status;
                $user->save();
                
                flash('<i class="icon-circle-check"></i> Usuario actualizado con satisfactoriamente!')->success()->important();
                return redirect()->to('users');
            }
            
        } else {
                $user=User::find($id);
                $user->name=$request->name;
                $user->email=$request->email;
                $user->user_type=$request->user_type;
                $user->status=$request->status;
                $user->save();
                
                flash('<i class="icon-circle-check"></i> Usuario actualizado con satisfactoriamente!')->success()->important();
                return redirect()->to('users');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user=User::find($request->user_id);
        $user->status=$request->status;
        $user->save();

        flash('<i class="icon-circle-check"></i> Status de Usuario actualizado a '.$request->status.' !')->success()->important();
                return redirect()->to('users');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'user_type' => ['required','string'],
            'status' => ['required','string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create_user(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function profile()
    {
        $user=User::find(\Auth::getUser()->id);

        return view('users.profile',compact('user'));
    }
}
