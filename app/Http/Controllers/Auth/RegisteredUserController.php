<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


use App\Models\Type; 
use App\Models\Restaurateur;
use App\Http\Requests\StoreRestaurateurRequest;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:restaurateurs'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed',],
            // 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'
            'address' => ['required', 'max:100'],
            'p_iva'=> ['required', 'size:11']
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'p_iva' => $request->p_iva,
        ]);

        event(new Registered($user));

        Auth::login($user);
        $user = Auth::user();

        $newRestaurateur = new Restaurateur();

        
        $form_data['address'] = $user['address'];
        $form_data['name'] = $user['name'];
        $form_data['user_id'] = $user['id'];
        
        $slug = Restaurateur::generateSlug($form_data['name']);

        $form_data['slug'] = $slug;
        $form_data['user_id'] = $user->id;

        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('images_folder', $request->image);

            $form_data['image'] = $path;
        }

        // $newRestaurateur->fill($form_data);

        // $newRestaurateur->save();
        $newRestaurateur = Restaurateur::create($form_data);

        if($request->has('types')){
            $newRestaurateur->types()->attach($request->types);
        }



        return redirect(RouteServiceProvider::HOME);
    }
}
