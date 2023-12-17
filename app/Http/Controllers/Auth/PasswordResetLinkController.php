<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Verifica se o e-mail existe no banco de dados antes de enviar o link de redefinição
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return view('reset-password')
            ->with('token', $request->token)
            ->with('email', $request->email)
            ->with('message', ['validation' => 'E-mail não encontrado no sistema.']);
        }

        //envio do link de redefinição de senha
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'email' => [__($status)],
            ]);
        }

        return view('reset-password')
            ->with('token', $request->token)
            ->with('email', $request->email)
            ->with('message', ['success' => 'E-mail de redefinição de senha reenviado, confira também na caixa de span.']);
    }
}
