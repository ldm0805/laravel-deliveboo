@extends('layouts.admin')
@section('content')
<h3 class="my-3">Informazioni ordine</h3>
<div>
    <span class="fw-bold">Cliente:</span> {{ $order->name }} {{ $order->surname }}
</div>
<div>
    <span class="fw-bold">Indirizzo:</span> {{ $order->address }}
</div>
<div>
    <span class="fw-bold">Totale ordine:</span> {{ $order->total }}
</div>
<div>
    <span class="fw-bold">Data ordine:</span> {{ $order->date }}
</div>
<h3 class="my-3">Contatti</h3>
<div>
    <span class="fw-bold">Telefono:</span> {{ $order->phone }}
</div>
<div>
    <span class="fw-bold">E-Mail:</span>:</span> {{ $order->mail }}
</div>
@endsection