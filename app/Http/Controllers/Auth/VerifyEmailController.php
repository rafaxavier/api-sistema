<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $user = $request->route('id') ? User::find($request->route('id')) : null;

        if (!$user || $user->hasVerifiedEmail()) {
            return redirect()->route('verification.show', ['verified' => 1]);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->route('verification.show', ['verified' => 0]);
    }

    public function show(Request $request)
    {   
        $verified = $request->query('verified');
        return view('verified', ['parametro' => $verified]);
    }
}
