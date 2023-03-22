<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurateur;
use App\Http\Requests\StoreRestaurateurRequest;
use App\Http\Requests\UpdateRestaurateurRequest;
use App\Http\Controllers\Controller; //NECESSARIO 
use App\Models\Type; 


class RestaurateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurateurs = Restaurateur::all();

        return view('admin.restaurateurs.index', compact('restaurateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.restaurateurs.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurateurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurateurRequest $request)
    {
        $form_data = $request->validated();



        $newRestaurateur = new Restaurateur();

        $slug = Restaurateur::generateSlug($form_data['name']);

        $form_data['slug'] = $slug;

        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('images_folder', $request->cover_image);

            $form_data['image'] = $path;
        }

        $newRestaurateur->fill($form_data);

        $newRestaurateur->save();

        if($request->has('types')){
            $newRestaurateur->types()->attach($request->types);
        }



        return redirect()->route('admin.restaurateurs.index', $newRestaurateur->id)->with('message', 'Ristoratore aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurateur  $restaurateur
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurateur $restaurateur)
    {
        return view('admin.restaurateur.show', compact('restaurateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurateur  $restaurateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurateur $restaurateur)
    {
        $types = Type::all();
        return view('admin.restaurateur.edit', compact('restaurateur', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurateurRequest  $request
     * @param  \App\Models\Restaurateur  $restaurateur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurateurRequest $request, Restaurateur $restaurateur)
    {
        $form_data = $request->validated();
    
        // Genero uno slug tramite una funzione (project.php) dal titolo del progetto
        $slug = Project::generateSlug($request->title);
    
        // Lo slug viene aggiunto ai dati del form
        $form_data['slug'] = $slug;
    
        if($request->has('cover_image')){
         
             if($project->cover_image){
                 Storage::delete($project->cover_image);
             }
             
             $path = Storage::disk('public')->put('project_images', $request->cover_image);
             $form_data['cover_image'] = $path;
         }
         
         if($request->has('tags')){
              $project->tags()->sync($request->tags);
         }
        $project->update($form_data);
 
        
        return redirect()->route('admin.restaurateur.index')->with('message', 'La modifica del project '.$project->title.' è andata a buon fine.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurateur  $restaurateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurateur $restaurateur)
    {
        //
    }
}
