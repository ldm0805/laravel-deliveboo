
<div class="lead-container">
    <h2>Deliveboo</h2>
    <p><strong>Nome:</strong> {{$lead->name}}</p>
    <p><strong>Cognome:</strong> {{$lead->surname}}</p>
    <p><strong>Email:</strong> {{$lead->mail}}</p>
    <p><strong>Telefono:</strong> {{$lead->phone}}</p>
    {{-- <p><strong>Totale:</strong> {{$lead->total}}</p> --}}
</div>
    <style>
        .lead-container {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }
    
        .lead-container h2 {
            margin-top: 0;
        }
    
        .lead-container p {
            margin-bottom: 5px;
        }
    
        .lead-container p strong {
            margin-right: 5px;
        }
    </style>