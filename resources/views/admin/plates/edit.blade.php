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
            <form method="POST" action="{{route('admin.plates.update', $plates->slug)}}">
                @csrf 

                @method('PUT')
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="nome">Name</label>
                    <input type="text" class="form-control" name="name" id="nome"  value="{{old('name') ?? $plates->name}}" placeholder="Inserire Nome">
                    @error('name')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="tipo">Tipo</label>
                    <select class="d-block" name="restaurateur_id" id="tipo">
                        <option value="">Seleziona tipo</option>
                        @foreach ($restaurateurs as $restaurateur)                                
                        <option value="{{$restaurateur->id}}" {{ $restaurateur->id == old('restaurateur_id', $plates->restaurateur_id) ? 'selected' : ''}}>{{$restaurateur->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    @foreach ($orders as $order)
                    <div class="form-check @error('orders')
                        is-invalid
                    @enderror">
                        @if ($errors->any())                    
                        <input class="form-check-input" type="checkbox" value="{{ $order->id }}" name='orders[]' {{ in_array($order->id, old('orders', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $order->name }}
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="{{ $order->id }}" name='orders[]' {{ $restaurateur->orders->contains($order) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ $order->name }}
                        </label>
                        @endif
                    </div>                        
                    @endforeach
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="ingredienti">Ingredients</label>
                    <input type="text" class="form-control" name="ingredients" id="ingredienti" value="{{old('ingredients') ?? $restaurateur->ingredients}}" placeholder="Inserire Ingredienti">
                    @error('ingredients')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="prezzo">Price</label>
                    <input type="text" class="form-control" name="price" id="prezzo" value="{{old('price') ?? $restaurateur->price}}" placeholder="Inserire Prezzo">
                    @error('price')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="visibile">Visible</label>                           
                    <select class="d-block" name="availability" id="visibile">
                        <option value="">Seleziona visible</option>                           
                        <option value="{{old('visible') ?? $plates->id}}">{{$plates->visible}}</option>
                    </select>                   
                    @error('availability')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="disponibile">Disponibilità</label>
                    <select class="d-block" name="availability" id="disponibile">
                        <option value="">Seleziona visible</option>                           
                        <option value="{{old('availability') ?? $plates->id}}">{{$plates->availability}}</option>
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
                    <div class="my-3">
                        <img src="{{ asset('storage/' .$plates->image)}}">
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