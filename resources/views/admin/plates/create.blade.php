@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row text-white">
        <div class="d-flex justify-content-between align-items-center">
			<h1>AGGIUNGI PIATTO</h1>
			<a href="{{route('admin.plates.index') }}" class="btn btn-secondary">
				<i class="fa-solid fa-arrow-left fa-lg fa-fw"></i> Torna ai piatti
			</a>
		</div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('admin.plates.store')}}"  enctype="multipart/form-data">
                @csrf 
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="nome">Name</label>
                    <input type="text" class="form-control" name="name" id="nome" placeholder="Inserire Nome">
                    @error('name')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="ristorante">Ristorante</label>
                    <select class="d-block form-control" name="restaurateur_id" id="ristorante">
                        <option value="">Seleziona tipo</option>
                        @foreach ($restaurateurs as $restaurateur)                                
                        <option value="{{$restaurateur->id}}">{{$restaurateur->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="ingredienti">Ingredienti</label>
                    <input type="text" class="form-control" name="ingredients" id="ingredienti" placeholder="Inserire Ingredienti">
                    @error('ingredients')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="prezzo">Prezzo</label>
                    <input type="number" class="form-control" name="price" id="prezzo" placeholder="Inserire Prezzo" step=".01" min="0" max="99.99">
                    @error('price')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="visibile">Visible</label>
                    <select class="d-block form-control" name="visible" id="visibile">  
                        <option value="">Seleziona disponibilità</option>
                        <option value="0">no</option>      
                        <option value="1">si</option>      
                    </select>
                    @error('visible')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>                
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="disponibile">Availability</label>
                    <select class="d-block form-control" name="availability" id="disponobile">
                        <option value="">Seleziona disponibilità</option>                           
                        <option value="0">no</option>      
                        <option value="1">si</option>                
                    </select>
                    @error('availability')
                    <div class="mt-2 alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="immagine">Image</label>
                    <input type="file" class="form-control" name="image" id="immagine" placeholder="Inserire Immagine">
                    @error('image')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Salva</button>
            </form>
        </div>
    </div>
</div>
@endsection