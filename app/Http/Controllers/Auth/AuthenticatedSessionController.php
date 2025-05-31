<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();
$user=$request->user();
return response()->json([
    'message' =>'connextion ok',
    'token'=>$user->createToken('api-token')->plainTextToken

]);

        //return response()->noContent();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)

    {

         $request->user()->currentAccessToken()->delete();
        // Supprime le token utilisé
        //$request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
