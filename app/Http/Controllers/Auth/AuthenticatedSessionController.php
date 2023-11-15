<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user_logged = Auth::user();
            $token = $request->user()->createToken('user_id_'.$user_logged->id, ['*'], Carbon::now()->addDays(1));
            return response()->json(['success' => true, 'message' => 'Usuário autenticado com sucesso', 'user' => $request->user(), 'token' => $token->plainTextToken], 200);
        }
        return response()->json(['success' => false, 'message' => 'Usuário ou senha inválido'], 401);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            if ($user) {
                $user->tokens()->delete();
            }

            return response()->json(['success' => true, 'message' => 'Usuário deslogado']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e], 500);
        }
    }
}
