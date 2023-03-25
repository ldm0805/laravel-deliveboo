@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row text-white">
        <div class="d-flex justify-content-between align-items-center">
			<h1>AGGIUNGI RISTORATORE</h1>
			<a href="{{route('admin.restaurateurs.index') }}" class="btn btn-secondary">
				<i class="fa-solid fa-arrow-left fa-lg fa-fw"></i> Torna ai ristoranti
			</a>
		</div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('admin.restaurateurs.store')}}" enctype="multipart/form-data">
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
                <label class="fs-2 my-1 fw-semibold">
                    Cucina:
                </label>
                <div class="form-group d-flex flex-wrap m-2">
                    @foreach ($types as $type)
                    <div class="form-check @error('types')
                        is-invalid
                    @enderror">
                    <div class="m-2">
                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name='types[]'>
                        <label class="form-check-label">
                            {{ $type->name }}
                        </label>
                    </div>
                    </div>                        
                    @endforeach
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="indirizzo">Indirizzo</label>
                    <input type="text" class="form-control" name="address" id="indirizzo" placeholder="Inserire Indirizzo">
                    @error('address')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="immagine">Immagine</label>
                    <input type="file" class="form-control" name="image" id="immagine" placeholder="Inserire Image">
                    @error('image')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
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
     
         {!!JsValidator::formRequest('App\Http\Requests\StoreRestaurateurRequest')!!}
@endsection