@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach                        
                </ul>
            @endif
            <form method="POST" action="{{route('admin.restaurateurs.update', $restaurateurs->slug)}}">
                @csrf 

                @method('PUT')
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="nome">Name</label>
                    <input type="text" class="form-control" name="name" id="nome"  value="{{old('name') ?? $restaurateurs->name}}" placeholder="Inserire Nome">
                    @error('name')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name='types[]' {{ $restaurateurs->types->contains($type) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $type->name }}
                        </label>
                        @endif
                    </div>                        
                    @endforeach
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="mail">Email</label>
                    <input type="email" class="form-control" name="email" id="mail" value="{{old('email') ?? $restaurateurs->email}}" placeholder="Inserire Email">
                    @error('email')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="indirizzo">Address</label>
                    <input type="text" class="form-control" name="address" id="indirizzo" value="{{old('address') ?? $restaurateurs->address}}" placeholder="Inserire Indirizzo">
                    @error('address')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="iva">P_iva</label>
                    <input type="text" class="form-control" name="p_iva" id="iva" value="{{old('p_iva') ?? $restaurateurs->p_iva}}" placeholder="Inserire P_iva">
                    @error('p_iva')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="immagine">Image</label>
                    <input type="file" class="form-control" name="image" id="immagine"  placeholder="Inserire Image">
                    <div class="my-3">
                        <img src="{{ asset('storage/' .$restaurateurs->image)}}">
                    </div>
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