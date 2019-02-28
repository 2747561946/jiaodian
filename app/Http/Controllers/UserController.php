<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Hash;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Illuminate\Support\Facades\Cache;


class UserController extends Controller
{
    //注册
    public function register()
    {
        return view('user.register');
    }
    public function doregister(UserRequest $req)
    {
        $name = 'code-'.$req->mobile;
        $code = Cache::get($name);
        if($code || $code != $req->mobile_code)
        {
            return back()->withErrors(['mobile_code'=>'验证码错误']);
        }

        $password = Hash::make($req->password);
        $user = new User;
        $user->username = $req->username;
        $user->mobile = $req->mobile;
        $user->password = $password;

        $user->save();
        return redirect()->route('login');
    }

    // 发送验证码(手机)
    public function sendcode(Request $req)
    {
        $code = rand(100000,999999);
        $name = 'code-'.$req->mobile;
        Cache::put($name,$code,1);

        $config = [
            'accessKeyId'    => 'LTAIjaq3arJIgNNX',
            'accessKeySecret' => 'tasQ8MHbJJyDJtSPPRee7WW4TxMR3h',
        ];
        
        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($req->mobile);
        $sendSms->setSignName('SNS项目');
        $sendSms->setTemplateCode('SMS_135044062');
        $sendSms->setTemplateParam(['code' => $code]);
        $sendSms->setOutId('demo');

        // return [
        //     'code' => $code,
        // ];
        $btn_send = $client->execute($sendSms);
        if($btn_send->Message == 'OK')
        {
            return [
                'status' => '1',
                'message' => '发送成功',
                // 'code' => Cache::get($name),
            ];
        }
        else
        {
            return [
                'status' => '0',
                'message' => '发送失败',
                'code' => $code,
            ];
        }
        
        // print_r($client->execute($sendSms));
    }

    // 登录
    public function login()
    {
        return view('user.login');
    }
    public function dologin(LoginRequest $req)
    { 
        // $user = session['id'];
        $user = User::where('mobile',$req->mobile)->first();
        // session['id'] = $user->id;
        // dd($user);
        if($user)
        {
            if(Hash::check($req->password,$user->password))
            {
                session([
                    'id' => $user->id,
                    'username' => $user->username,
                    'mobile' => $user->mobile,
                ]);
        
                return redirect()->route('index');
            }
            else
            {
                return back()->withInput()->withErrors('密码错误');
            }
        }
        else
        {
            return back()->withInput()->withErrors('电话错误');
        }
    }

    // 退出
    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect()->route('index');
    }

   
}
