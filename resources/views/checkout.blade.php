<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Pagina dati</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h3 class="text-center">Benvenuto nel riepilogo del tuo ordine</h3>
                <h5 class="my-4">Inserisci i seuguenti dati per completare il tuo ordine:</h5>
                <form action="">
                    <div class="form-group my-2">
                        <label class="fs-2 my-1 fw-semibold" for="nome">Nome</label>
                        <input type="text" class="form-control" placeholder="Inserisci il tuo nome">
                    </div>
                    <div class="form-group my-2">
                        <label class="fs-2 my-1 fw-semibold" for="Cognome">Cognome</label>
                        <input type="text" class="form-control" placeholder="Inserisci il tuo Cognome">
                    </div>
                    <div class="form-group my-2">
                        <label class="fs-2 my-1 fw-semibold" for="Città">Città</label>
                        <input type="text" class="form-control" placeholder="Inserisci il tuo Città">
                    </div>
                    <div class="form-group my-2">
                        <label class="fs-2 my-1 fw-semibold" for="Indirizzo">Indirizzo</label>
                        <input type="text" class="form-control" placeholder="Inserisci il tuo Indirizzo">
                    </div>
                    <div class="form-group my-2">
                        <label class="fs-2 my-1 fw-semibold" for="Cap">Cap</label>
                        <input type="text" class="form-control" placeholder="Inserisci il tuo Cap">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="/session" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" id="checkout-live-button" class="btn btn-primary">Paga</button>
                    {{-- commento prova --}}
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
