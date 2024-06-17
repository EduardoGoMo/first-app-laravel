<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    //página principal al iniciar sesión
    public function showCorrectHomepage(){
        if (auth()->check()) {
            return view('homepage-feed');
        } else{
            return view('homepage');
        }
    }

    //inicio de sesión
    public function login(Request $request){
        $entradas = $request->validate([
            'loginusername'=>'required',
            'loginpassword'=>'required'
        ]);

        if (auth()->attempt(['username' => $entradas['loginusername'], 'password' => $entradas['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success','Has iniciado correctamente tu sesión');
        } 
        else{
            return redirect('/')->with('error','Error al iniciar sesión, intentalo de nuevo');
        }
    }

    //mostrar perfil de usuario
    public function showProfile(User $user){
        $currentlyFollowing = 0;
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id','=',auth()->user()->id],['followeduser','=',$user->id]])->count();
        }

        return view('profile-post',['currentlyFollowing' => $currentlyFollowing,'avatar'=> $user->avatar,'username'=>$user['username'],'posts'=>$user->posts()->latest()->get(), 'postCount'=>$user->posts()->count()]);
    }

    //cerrar sesión
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Has cerrado tu sesión exitosamente');
    }

    //Regitro de usuarios a la BD
    public function register(Request $request){
        $entradas = $request->validate([
            'username' => ['required','min:3','max:20',Rule::unique('users','username')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','min:8','confirmed']
        ]);
        
        $entradas['password'] = bcrypt($entradas['password']);
        
        $user = User::create($entradas);
        auth()->login($user);
        return redirect('/')->with('success','Cuenta creada');
    }

    //cambiar avatar
    public function showAvatarForm(){
        return view('avatar-form');
    }

    //almacenar avatar
    public function storeAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|max:3000'
        ]);

        $user = auth()->user();
        $filename = $user->id . '-' . uniqid() . '.jpg';

        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('avatar'));
        $imgData = $image->cover(120,120)->toJpeg();
        Storage::put("public/avatars/" . $filename, $imgData);

        $oldAvatar = $user->avatar;
        
        $user->avatar = $filename;
        $user->save();
        
        if ($oldAvatar != "/fallback-avatar.jpg") {
            Storage::delete(str_replace("/storage/","public/", $oldAvatar));
        }

        return back()->with('success','Avatar actualizado');
    }
}
