<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plate;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Http\Controllers\Controller; //NECESSARIO  
use Illuminate\Support\Facades\Storage;
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
        $plates = Plate::all();

        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates = Plate::all();

        $restaurateurs = Restaurateur::all();
        return view('admin.plates.create', compact('plates','restaurateurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlateRequest $request)
    {
        $form_data = $request->validated();

        $newPlate = new Plate();

        $slug = Plate::generateSlug($form_data['name']);

        $form_data['slug'] = $slug;

        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('images_folder', $request->image);

            $form_data['image'] = $path;
        }

        $newPlate->fill($form_data);

        $newPlate->save();

        return redirect()->route('admin.restaurateurs.index', $newPlate->slug)->with('message', 'Piatto aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
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
        $restaurateurs = Restaurateur::all();
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
        return redirect()->route('admin.plates.index')->with('message', 'La modifica del è andata a buon fine.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();
        return redirect()->route('admin.plates.index')->with('message', 'La cancellazione del è andata a buon fine.');
    }
}
