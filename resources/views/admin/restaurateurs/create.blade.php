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
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold">
                        Cucina:
                    </label>
                    @foreach ($types as $type)
                    <div class="form-check @error('types')
                        is-invalid
                    @enderror">
                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name='types[]'>
                        <label class="form-check-label">
                            {{ $type->name }}
                        </label>
                    </div>                        
                    @endforeach
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="mail">Email</label>
                    <input type="email" class="form-control" name="email" id="mail" placeholder="Inserire Email">
                    @error('email')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
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
                    <label class="fs-2 my-1 fw-semibold" for="iva">Partiva Iva</label>
                    <input type="text" class="form-control" name="p_iva" id="iva" placeholder="Inserire P_iva">
                    @error('p_iva')
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
@endsection