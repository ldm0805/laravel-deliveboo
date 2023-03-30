@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row text-white">
        <div class="d-flex justify-content-between align-items-center">
			<h1>AGGIUNGI PIATTO</h1>
		</div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('admin.plates.store')}}"  enctype="multipart/form-data">
                @csrf 
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="nome">Nome</label>
                    <input type="text" class="form-control" name="name" id="nome" placeholder="Inserire Nome">
                    @error('name')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="ristorante">Ristorante</label>
                    <select class="d-block form-control" name="restaurateur_id" id="restaurateur_id">
                        <option value="">Seleziona tipo</option>
                        @foreach ($form_data as $index => $data)      
                        @foreach ($restaurateurs as $restaurateur)
                        <option value="{{$restaurateur->id}}" {{$restaurateur->id == $index ? 'selected' : ''}}>{{$restaurateur->name}}</option>
                        @endforeach                          
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="ingredienti">Ingredienti</label>
                    <input type="text" class="form-control" name="ingredients" id="ingredienti" placeholder="Inserire Ingredienti">
                    @error('ingredients')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="prezzo">Prezzo</label>
                    <div class="input-group mb-3">
                        <input type="number" data-bs-input class="form-control input-number input-number-currency" name="price" id="prezzo" placeholder="Inserire Prezzo (&euro;)" step=".01" min="0" max="99.99">
                        <span class="input-group-text" id="basic-addon1">€</span>
                    </div>
                    @error('price')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="visibile">Visibilità</label>
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
                    <label class="fs-2 my-1 fw-semibold" for="disponibile">Disponibilità</label>
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
                    <label class="fs-2 my-1 fw-semibold" for="immagine">Immagine</label>
                    <input type="file" class="form-control" name="image" id="immagine" placeholder="Inserire Immagine">
                    @error('image')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="control-label mb-2">
                        Contenuto
                    </label>
                    <textarea type="text-area" class="form-control" placeholder="Descrizione" id="description" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-success my-4">Salva</button>
            </form>
        </div>
    </div>
</div>
    <!-- Javascript Requirements -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    
    {!!JsValidator::formRequest('App\Http\Requests\StorePlateRequest')!!}
@endsection