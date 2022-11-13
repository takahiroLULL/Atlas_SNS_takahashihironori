<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:2|max:12',
                          //入力必須|文字列であるか|２文字以上|12文字以内
            'mail' => 'required|string|email|min:5|max:40|unique:users,mail',
                       //入力必須|文字列であるか|登録済みメアド×|5文字以上|40文字以内|メアドの形式
            'password' => 'required|string|min:8|max:20|confirmed|alpha_num',
                         //入力必須|文字列であるか|8文字以上|20文字以内|confirmedと同値か|英数列か
            'password_confirmation' => 'required|string|min:8|max:20|same:password',
                                        //入力必須｜pass
        ],
        [
        'username.required' => 'ユーザー名を入力してください',
        'username.min' => 'ユーザー名は2文字以上、12文字以下で入力してください',
        'username.max' => 'ユーザー名は2文字以上、12文字以下で入力してください',
        'mail.required' => 'メールアドレスを入力してください',
        'mail.email' => '有効なEメールアドレスを入力してください',
        'mail.min' => 'メールアドレスは5文字以上、40文字以下で入力してください',
        'mail.max' => 'メールアドレスは5文字以上、40文字以下で入力してください',
        'mail.unique' => 'このメールアドレスは既に使われています',
        'password.required' => 'パスワードを入力してください',
        'password.min' => 'パスワードは8文字以上、20文字以下で入力してください',
        'password.max' => 'パスワードは8文字以上、20文字以下で入力してください',
        'password.alpha_dash' => 'パスワードは英数字のみ入力してください',
        'password.confirmed' => '確認パスワードが一致しません',
        'password_confirmation.required' => '確認パスワードを入力してください',
        'password.alpha_num' => 'パスワードは半角数字で入力してください',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){ //$requestにpostとして持ってく
            $data = $request->input();//$dateにユーザーデータを持っていく
            
            $validator = $this->validator($data);

            if ($validator->fails()) {
                return redirect('/register')
                ->withErrors($validator)
                ->withInput();
                }

                $this->create($data);//$dateを入力して作る $thisを使うことによって他のメソッドも使える よくみると＄thisの色が違う。

            $username =  $request->input('username');//$usernameとしてusernameを代入
            session()->put('username',$username);
            // return redirect('added');//addedに行く
            return view('auth.added')
        ->with('username',$username);
        }
        return view('auth.register')
        ;
    }


    public function added(){
        return view('auth.added');
    }
    
}
