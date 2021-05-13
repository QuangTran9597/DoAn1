<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPasswordRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\ForgotPassEmail;
use App\Notifications\VerifyEmail;
// use App\Mail\VerifyEmail
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use stdClass;

class RegisterController extends Controller
{
    public function register(){
        return view('layout.register');
    }

    public function register_user(RegisterRequest $request)
    {
        // dd($request->all());

        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'quyen' => 'user',

        ]);

        $user->notify(new VerifyEmail());

        return \redirect()->route('post.register')->with('message', 'Bạn đã đăng ký thành công. Vui lòng Check Email');

    }

    public function verifyEmail($id)
    {
        $user = User::query()->findOrFail($id);

        $user->update(['email_verified_at' => now()]);

        return redirect()->route('login');
    }

    // Forgot Password
    public function forgot_password(){
        return view('layout.forgot_password');
    }

    public function forgotPassword(Request $request)
    {
         $this->validate($request,
            [
                'email' => 'required|email|email',
            ],
            [
               'email.required' => 'Bạn chưa nhập Email',
                'email.email' => 'Bạn chưa nhập đúng định dạng Email',
            ]
        );
            // Sử dụng Notification
            $user = User::query()->where('email', $request->input('email'))->first();

            if($user && $user->email !== null) {

                $user->notify(new ForgotPassEmail());

                return redirect()->route('forgot_password')->with('message', 'Vui lòng kiểm tra Email');

            } else {

                return  back()->with('message', 'Không tìm thấy email, Xin vui lòng thử lại');
            }

            //Sử dụng Mailable Classes
            // $user = User::query()->where('email', $request->input('email'))->first();

            // if($user && $user->email !== null)
            //  {
            //     $data = new stdClass();
            //     $data-> email = $user->email;
            //     $data-> name = $user->name;

            //     Mail::to($user)->send(new  VerifyEmail($data));

            //     return redirect()->route('forgot_password')->with('message', 'Vui lòng kiểm tra Email');
            // }

    }

    public function ShowNewPassword($id)
    {
        $user = User::query()->findOrFail($id);

        return view('layout.newPassword', compact('user'));

    }

    public function NewPassword(NewPasswordRequest $request, $id)
    {
        // dd($request->toArray());

        $user = User::query()->findOrFail($id);

        $user->update([
            'password' => Hash::make($request->input('password')),
            'email_verified_at' => now(),
        ]);

        return back()->with('message', 'Bạn đã đổi mật khẩu thành công. Vui lòng đăng nhập lại');

    }

}
