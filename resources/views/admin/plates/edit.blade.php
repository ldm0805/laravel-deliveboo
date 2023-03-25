@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')

@section('content')
<div class="container mt-5">
    <div class="row text-white">
        <div class="d-flex justify-content-between align-items-center">
			<h1>MODIFICA PIATTO</h1>
			<a href="{{route('admin.plates.index') }}" class="btn btn-secondary">
				<i class="fa-solid fa-arrow-left fa-lg fa-fw"></i> Torna ai piatti
			</a>
		</div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('admin.plates.update', $plate->slug)}}"  enctype="multipart/form-data">
                @csrf 

                @method('PUT')
                
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="nome">Name</label>
                    <input type="text" class="form-control" name="name" id="nome"  value="{{old('name') ?? $plate->name}}" placeholder="Inserire Nome">
                    @error('name')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="tipo">Tipo</label>
                    <select class="d-block form-select" name="restaurateur_id" id="tipo">
                        <option value="">Seleziona tipo</option>
                        @foreach ($restaurateurs as $restaurateur)                                
                        <option value="{{$restaurateur->id}}" {{ $restaurateur->id == old('restaurateur_id', $plate->restaurateur_id) ? 'selected' : ''}}>{{$restaurateur->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="ingredienti">Ingredients</label>
                    <input type="text" class="form-control" name="ingredients" id="ingredienti" value="{{old('ingredients') ?? $plate->ingredients}}" placeholder="Inserire Ingredienti">
                    @error('ingredients')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="prezzo">Price</label>
                    <input type="number" class="form-control" name="price" id="prezzo" value="{{old('price') ?? $plate->price}}" placeholder="Inserire Prezzo" step=".01" min="0" max="99.99">
                    @error('price')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="visibile">Visible</label>                           
                    <select class="d-block form-select" name="visible" id="visibile">  
                        <option value="">Seleziona disponibilità</option>
                        <option value="0" {{ 0 == old('visible', $plate->visible) ? 'selected' : ''}}>no</option> 
                        <option value="1" {{ 1 == old('visible', $plate->visible) ? 'selected' : ''}}>si</option>          
                    </select>            
                    @error('availability')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="disponibile">Disponibilità</label>
                    <select class="d-block form-select" name="availability" id="disponobile">
                        <option value="">Seleziona disponibilità</option>                           
                        <option value="0" {{ 0 == old('availability', $plate->availability) ? 'selected' : ''}}>no</option> 
                        <option value="1" {{ 1 == old('availability', $plate->availability) ? 'selected' : ''}}>si</option>                                      
                    </select>                    
                    @error('availability')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="immagine">Image</label>
                    <input type="file" class="form-control" name="image" id="immagine"  placeholder="Inserire Immagine">
                    <div class="my-3 image-size">
                        {!! $utils->displayImage($plate->image, $plate->name) !!}
                    </div>
                    @error('image')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="control-label mb-2">
                        Descrizione
                    </label>
                    <textarea type="text-area" class="form-control" placeholder="Descrizione" id="description" name="description">{{old('description') ?? $plate->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Salva</button>
            </form>
        </div>
    </div>
</div>
    <!-- Javascript Requirements -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    
    {!!JsValidator::formRequest('App\Http\Requests\UpdatePlateRequest')!!}
@endsection