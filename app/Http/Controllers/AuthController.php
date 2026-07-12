<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Handle login POST request.
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required|in:admin,manager,dispatcher,safety,finance',
        ]);

        $user = User::where('email', $data['email'])
                    ->where('role', $data['role'])
                    ->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            // Redirect to role‑specific dashboard
            return redirect()->route($data['role'] . '.dashboard');
        }

        return back()->withErrors(['login' => 'Invalid credentials or role']);
    }

    /**
     * Logout the authenticated user.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
?>
