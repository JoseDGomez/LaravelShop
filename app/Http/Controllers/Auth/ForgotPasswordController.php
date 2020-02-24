<?php
 
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
 
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
 
    // Comentamos esto que no nos hace falta
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
 
    // Añadimos las respuestas JSON, ya que el Frontend solo recibe JSON
    protected function sendResetLinkResponse($response)
{
    if (request()->header('Content-Type') == 'application/json') {
        return response()->json(['success' => 'Recovery email sent.']);
    }
    return back()->with('status', trans($response));
}

protected function sendResetLinkFailedResponse(Request $request, $response)
{
    if (request()->header('Content-Type') == 'application/json') {
        return response()->json(['error' => 'Oops something went wrong.']);
    }

    return back()->withErrors(
        ['email' => trans($response)]
    );
}
}