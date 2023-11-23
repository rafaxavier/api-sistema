<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'access_type' => ['required', 'string'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'access_type' => $request->access_type
            ]);

            event(new Registered($user));

            Auth::login($user);
            $user_logged = Auth::user();
            $token = $request->user()->createToken($user_logged->id .'_id_user', ['*'], Carbon::now()->addDays(1));

            return response()->json(['success' => true, 'message' => 'Usuário registrado com sucesso', 'user' => $user_logged, 'token' => $token->plainTextToken], 200);
        } catch (QueryException $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao criar o usuário. Por favor, tente novamente.'], 500);
        }
    }
}
