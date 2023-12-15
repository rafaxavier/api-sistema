<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return view('reset-password')
                ->with('token', $request->token)
                ->with('email', $request->email)
                ->with('message', ['validation' => $validator->errors()->first()])
                ;
        }
        
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if($status === 'passwords.token'){
            return view('reset-password')
                ->with('token', $request->token)
                ->with('email', $request->email)
                ->with('message', ['token' => 'Token expirado']);
        }

        return view('reset-password')
                ->with('token', $request->token)
                ->with('email', $request->email)
                ->with('message', ['success' => 'Senha alterada com sucesso']);
        
        return response()->json(['message' => __($status)]);
    }

    public function show($token, Request $request)
    {
        $email = $request->query('email');
        return view('reset-password', ['token' => $token, 'email' => $email,'message'=>'']);
    }
}
