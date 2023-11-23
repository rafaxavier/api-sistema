<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    //****** */ modo redirect
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->route('id') ? User::find($request->route('id')) : null;

        if (!$user || $user->hasVerifiedEmail()) {
            return redirect()->route('verified', ['verified' => 0]);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->route('verified', ['verified' => 1]);
    }


    //******** */ modo json
    // public function __invoke(EmailVerificationRequest $request): JsonResponse
    // {
    //     $user = $request->route('id') ? User::find($request->route('id')) : null;

    //     if (!$user || $user->hasVerifiedEmail()) {
    //         return response()->json(['message' => 'Email already verified', 'user' => $user], 200);
    //     }

    //     if ($user->markEmailAsVerified()) {
    //         event(new Verified($user));
    //     }

    //     return response()->json(['message' => 'Email verified successfully', 'user' => $user], 200);
    // }


    //******* */ original redirect pro front ??
    /**
     * Mark the authenticated user's email address as verified.
     */
    // public function __invoke(EmailVerificationRequest $request): RedirectResponse
    // {       
    //     dd($request);
    //     if ($request->user()->hasVerifiedEmail()) {
    //         dd($request);
    //         return redirect()->intended(
    //             config('app.frontend_url').RouteServiceProvider::HOME.'?verified=1'
    //         );
    //     }

    //     if ($request->user()->markEmailAsVerified()) {
    //         event(new Verified($request->user()));
    //     }

    //     return redirect()->intended(
    //         config('app.frontend_url').RouteServiceProvider::HOME.'?verified=1'
    //     );
    // }
}
