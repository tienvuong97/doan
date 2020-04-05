<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    //
    public function getListAdmin(){
        $user = User::paginate(5);
        return view('admin.pages.user.list',['user'=>$user]);
    }
    public function getAddAdmin(){
        return view('admin.pages.user.add');
    }
    public function postAddAdmin(Request $request){
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:32',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:32|confirmed',
                'phone' => 'min:10|max:20' 
            ],
            [
                'name.required' => 'Bạn chưa nhập họ và tên',
                'name.min' => 'Họ và tên chứa từ 3-32 kí tự',
                'name.max' => 'Họ và tên chứa từ 3-32 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Định dạng email chưa đúng',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu chứa từ 3-32 kí tự',
                'password.max' => 'Mật khẩu chứa từ 3-32 kí tự',
                'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp',
                'phone.min' => 'Số điện thoại phải chứa từ 10-20',
                'phone.max' => 'Số điện thoại phải chứa từ 10-20',
            ]
        );
        $user = User::create($request->only(['name', 'email', 'password','address','phone','role']));
        return redirect('admin/user/add')->with('thongbao','Thêm thành công');
    }
    public function getEditAdmin($id){
        $user = User::find($id);
        return view('admin.pages.user.edit',['user'=>$user]);
    }
    public function postEditAdmin(Request $request,$id){
        $this->validate($request,
       [
        'name' => 'required|min:3|max:32',
        'phone' => 'min:10|max:20'  
       ],
       [
        'name.required' => 'Bạn chưa nhập họ và tên',
        'name.min' => 'Họ và tên chứa từ 3-32 kí tự',
        'name.max' => 'Họ và tên chứa từ 3-32 kí tự',
        'phone.min' => 'Số điện thoại phải chứa từ 10-20',
        'phone.max' => 'Số điện thoại phải chứa từ 10-20',
       ]);
       $user = User::find($id);
       $user->name = $request->name;
       $user->phone = $request->phone;
       $user->address = $request->address;
       $user->role = $request->role;
       if(isset($request->changePassword) == "on")
       { 
        $this->validate($request,
       [
        'password' => 'required|min:3|max:32|confirmed',
       ],
       [
        'password.required' => 'Bạn chưa nhập mật khẩu',
        'password.min' => 'Mật khẩu chứa từ 3-32 kí tự',
        'password.max' => 'Mật khẩu chứa từ 3-32 kí tự',
        'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp',
       ]);
        $user->password = bcrypt($request->password);
       }
       $user->save();
       return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getDeleteAdmin($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('thongbao','Xóa thành công');
    }
    public function getLoginAdmin(){
        return view('admin.pages.login');
    }
    public function postLoginAdmin(Request $request){
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:3|max:32',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Định dạng email chưa đúng',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu chứa từ 3-32 kí tự',
                'password.max' => 'Mật khẩu chứa từ 3-32 kí tự',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->role == 1){
                return redirect('admin/category/list');}
            else {
                return back()->with('errorLogin', 'Đăng nhập không thành công');}
        } else {
            return back()->with('errorLogin', 'Đăng nhập không thành công');
        }
    }
    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
    public function redirectProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }
    public function handleProviderCallback($social)
    {
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser($user, $social);
        Auth::login($authUser);
        return redirect('/');
    }
    private function findOrCreateUser($user, $socialName)
    {
        $authUser = User::where('social_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_name' => $socialName,
                'social_id' => $user->id,
                'password' => '',
                'role' => 0,
                'status' => 0,
                'avatar' => $user->avatar,
                'phone'=>'',
                'active'=>0,
            ]);
        }
    }
    function postLoginClient(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:3|max:32',
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Định dạng email chưa đúng',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu chứa từ 3-32 kí tự',
                'password.max' => 'Mật khẩu chứa từ 3-32 kí tự',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return back()->with('errorLogin', 'Đăng nhập không thành công');
        }
    }
    function getLogoutClient()
    {
        Auth::logout();
        return redirect('/');
    }
    public function registerClient(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:32',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:32|confirmed',
            ],
            [
                'name.required' => 'Bạn chưa nhập họ và tên',
                'name.min' => 'Họ và tên chứa từ 3-32 kí tự',
                'name.max' => 'Họ và tên chứa từ 3-32 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Định dạng email chưa đúng',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu chứa từ 3-32 kí tự',
                'password.max' => 'Mật khẩu chứa từ 3-32 kí tự',
                'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp'
            ]
        );
        $user = User::create($request->only(['name', 'email', 'password']));
        Auth::login($user);
        return redirect('/');
    }
    public function updateUser(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:32',
                'phone' => 'min:10|max:20'
                
            ],
            [
                'name.required' => 'Bạn chưa nhập họ và tên',
                'name.min' => 'Họ và tên chứa từ 3-32 kí tự',
                'name.max' => 'Họ và tên chứa từ 3-32 kí tự',
                'phone.min' => 'Số điện thoại phải chứa từ 10-20',
                'phone.max' => 'Số điện thoại phải chứa từ 10-20',
            ]
        );
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone=$request->phone;
        if(isset($request->changePassword) == "on")
        {
            $this->validate(
                $request,
                [
                    'password' => 'required|min:3|max:32|confirmed',
                ],
                [
                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu chứa từ 3-32 kí tự',
                    'password.max' => 'Mật khẩu chứa từ 3-32 kí tự',
                    'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp'
                ]
            );
            $user->password = $request->password;
        }
        $user->save();
        return redirect('profile')->with('thongbao','Cập nhật thông tin cá nhân thành công');
    }
}
