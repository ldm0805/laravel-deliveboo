@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('admin.restaurateurs.update', $restaurateur->slug)}}"  enctype="multipart/form-data">
                @csrf 

                @method('PUT')
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="nome">Nome</label>
                    <input type="text" class="form-control" name="name" id="nome"  value="{{old('name') ?? $restaurateur->name}}" placeholder="Inserire Nome">
                    @error('name')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <label class="fs-2 my-1 fw-semibold" for="nome">Cucina:</label>
                <div class="form-group my-2">
                    @foreach ($types as $type)
                    <div class="form-check @error('technologies')
                        is-invalid
                    @enderror">
                        @if ($errors->any())                    
                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name='types[]' {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $type->name }}
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name='types[]' {{ $restaurateur->types->contains($type) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $type->name }}
                        </label>
                        @endif
                    </div>                        
                    @endforeach
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="mail">Email</label>
                    <input type="email" class="form-control" name="email" id="mail" value="{{old('email') ?? $restaurateur->email}}" placeholder="Inserire Email">
                    @error('email')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="indirizzo">Indirizzo</label>
                    <input type="text" class="form-control" name="address" id="indirizzo" value="{{old('address') ?? $restaurateur->address}}" placeholder="Inserire Indirizzo">
                    @error('address')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="iva">Partita Iva</label>
                    <input type="text" class="form-control" name="p_iva" id="iva" value="{{old('p_iva') ?? $restaurateur->p_iva}}" placeholder="Inserire P_iva">
                    @error('p_iva')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 my-1 fw-semibold" for="immagine">Immagine</label>
                    <input type="file" class="form-control" name="image" id="image"  placeholder="Inserire Image">
                    <div class="my-3 image-size">
                        {!! $utils->displayImage($restaurateur->image, $restaurateur->name) !!}
                    </div>
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