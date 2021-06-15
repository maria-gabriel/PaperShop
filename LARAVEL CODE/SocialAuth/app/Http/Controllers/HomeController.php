<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Image;
use App\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()){
           if(Auth::user()->perfil_id == 1){
              return view('homeGeneral');   
           }
           else{
              return view('homeAdmin');
           }
        }
    }

    public function editarPerfil(Request $request, $id)
    {
        request()->validate([ 
            'name'=>'required',
            'email'=>'required',
            //'password'=>'required',
            'type'=>'required',
            //'img'=>'required|image'
        ],[
            'name.required'=>'Ingrese su nombre',
            'email.required'=>'Ingrese su correo',
            //'password.required'=>'Ingrese una contraseña',
            'type.required'=>'Ingrese un tipo de usuario',
            'img.required'=>'Seleccione un avatar',
            //'img.image'=>'Debe ser formato imagen'
            
        ]);
        $u=User::findOrFail($id);
        $u->name=request()->get('name');
        $u->email=request()->get('email');
        //$u->password=request()->Hash::make(get('password'));
        $u->perfil_id=request()->get('type');
        if(!is_null($request->file('img'))){
        $originalImage= $request->file('img');
        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path().'/img/avatars/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $u->avatar=time().$originalImage->getClientOriginalName();
    }
        $u->save();
       return \Redirect::to('perfil')->with('msj','Los cambios han sido guardados');
    }

}
