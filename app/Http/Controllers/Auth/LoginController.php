<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Rules\ReCaptcha;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return route('dashboard'); // Yahan aap jis page par redirect karwana chahte hain, wo route dein
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        return redirect()->route('login');
    }
    public function showForm()
    {
        if (auth()->check() && auth()->user()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $credentials = [
            $login_type => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard'); // ya jahan aap redirect karna chahein
        }
        return back()->withErrors([
            'login' => 'Invalid login credentials.',
        ])->withInput();
    }
}
