<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plate;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Http\Controllers\Controller; //NECESSARIO  
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Restaurateur;


class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $plates = Plate::where('user_id', $user->id)->get();

        return view('admin.plates.index', compact('plates', 'item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates = Plate::all();

        $user = Auth::user();
        $restaurateurs = Restaurateur::where('user_id', $user->id)->get();
        return view('admin.plates.create', compact('plates','restaurateurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlateRequest  $request
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlateRequest $request, Plate $plate)
    {
        $form_data = $request->validated();

        $user = Auth::user();
        $restaurateur = Restaurateur::where('id', $request);

        $newPlate = new Plate();

        $slug = Plate::generateSlug($form_data['name']);
        $form_data['slug'] = $slug;
        $form_data['quantity'] = 0;
        $form_data['user_id'] = $user->id;


        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('images_folder', $request->image);

            $form_data['image'] = $path;
        }

        $newPlate->fill($form_data);

        $newPlate->save();

        return redirect()->route('admin.plates.index', $newPlate->slug)->with('message', 'Il piatto: '.$newPlate->name.' è stato aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        $user = Auth::user();

        if($user->id != $plate->restaurateur_id){
            return redirect()->route('admin.restaurateurs.index')->with('message', 'Non puoi modificare gli elementi di un altro utente');
        }
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        $user = Auth::user();

        if($user->id != $plate->restaurateur_id){
            return redirect()->route('admin.restaurateurs.index')->with('message', 'Non puoi modificare gli elementi di un altro utente');
        }
        $restaurateurs = Restaurateur::where('user_id', $user->id)->get();
        return view('admin.plates.edit', compact('plate','restaurateurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlateRequest  $request
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlateRequest $request, Plate $plate)
    {
        $form_data = $request->validated();
    
        // Genero uno slug tramite una funzione (project.php) dal titolo del progetto
        $slug = Plate::generateSlug($request->name);
    
        // Lo slug viene aggiunto ai dati del form
        $form_data['slug'] = $slug;
    
        if($request->has('image')){
         
             if($plate->image){
                 Storage::delete($plate->image);
             }
             
             $path = Storage::disk('public')->put('images_folder', $request->image);
             $form_data['image'] = $path;
         }

        $plate->update($form_data);       
        return redirect()->route('admin.plates.index')->with('message', 'La modifica è andata a buon fine.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $user = Auth::user();

        if($user->id != $plate->restaurateur_id){
            return redirect()->route('admin.restaurateurs.index')->with('message', 'Non puoi modificare gli elementi di un altro utente');
        }
        $plate->delete();
        return redirect()->route('admin.plates.index')->with('message', 'Il piatto: '.$plate->name.' è stato cancellato correttamente');
    }
}
