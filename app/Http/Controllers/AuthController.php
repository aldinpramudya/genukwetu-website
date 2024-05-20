<?php
  
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class AuthController extends Controller
{
//  /**
//      * Register a User.
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function register() {
//         $validator = Validator::make(request()->all(), [
//             'name' => 'required',
//             'username' => 'required',
//             'password' => 'required|confirmed|min:8',
//         ]);
  
//         if($validator->fails()){
//             return response()->json($validator->errors()->toJson(), 400);
//         }
  
//         $user = new User;
//         $user->name = request()->name;
//         $user->username = request()->username;
//         $user->password = bcrypt(request()->password);
//         $user->save();
//         return response()->json($user, 201);
//     }
  
  
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    return $this->respondWithToken($token);
    }
  
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
  
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
  
        return response()->json(['message' => 'Successfully logged out']);
    }
  
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // Memastikan token valid dan dapat direfresh
        if (!$token = Auth::refresh()) {
            return response()->json(['error' => 'Could not refresh token'], 401);
        }

        return $this->respondWithToken($token);
    }
  
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
     protected function respondWithToken($token)
    {
        // Menggunakan guard untuk mendapatkan TTL dari token
        $ttl = Auth::factory()->getTTL();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $ttl * 60
        ]);
    }
}