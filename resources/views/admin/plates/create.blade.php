@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('admin.plates.store')}}">
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
                    <select class="d-block" name="restaurateur_id" id="ristorante">
                        <option value="">Seleziona tipo</option>
                        @foreach ($restaurateurs as $restaurateur)                                
                        <option value="{{$restaurateur->id}}">{{$restaurateur->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    @foreach ($orders as $order)
                    <div class="form-check @error('order')
                        is-invalid
                    @enderror">
                        <input class="form-check-input" type="checkbox" value="{{ $order->id }}" name='orders[]'>
                        <label class="form-check-label">
                            {{ $order->name }}
                        </label>
                    </div>                        
                    @endforeach
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="ingredienti">Ingredients</label>
                    <input type="text" class="form-control" name="ingredients" id="ingredienti" placeholder="Inserire Ingredienti">
                    @error('ingredients')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="prezzo">Price</label>
                    <input type="number" class="form-control" name="price" id="prezzo" placeholder="Inserire Prezzo">
                    @error('price')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="visibile">Visible</label>
                    <select class="d-block" name="availability" id="tipo">
                        <option value="">Seleziona visible</option>                           
                        <option value="{{$plates->id}}">{{$plates->visible}}</option>
                    </select>
                    @error('visible')
                        <div class="mt-2 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="disponibile">Availability</label>
                    <select class="d-block" name="availability" id="disponobile">
                        <option value="">Seleziona disponibilità</option>                           
                        <option value="{{$plates->id}}">{{$plates->availability}}</option>
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