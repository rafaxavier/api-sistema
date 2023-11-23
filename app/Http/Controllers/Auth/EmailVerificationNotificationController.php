<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['success'=>false ,'message' => 'Este e-mail já foi verificado', 'user' => $request->user()], 409);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['success'=>true, 'message' => 'Link de verificação de e-mail reenviada']);
    }
}
