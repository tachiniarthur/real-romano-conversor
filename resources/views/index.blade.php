<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Conversor Real Romano</title>
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column align-items-center gap-4 mt-5 py-4 rounded-4 border border-4">
            <h1>Conversor Real Romano</h1>
            <form action="{{ route('index') }}" method="post">
                @csrf
                <div class="d-flex flex-column align-items-center">
                    <label class="fs-5 fw-semibold" for="number">Digite um número real ou romano</label>
                    <div class="d-flex mt-2 gap-2 align-items-center">
                        <input class="form-control" text="text" name="number" id="number" placeholder="Digite aqui">
                        <button class="btn btn-secondary" type="submit">Converter</button>
                    </div>
                </div>
            </form>
            @if (isset($valorConvertido))
                <span class="text-success fs-5 fw-semibold">Resultado: {{ $valorConvertido }}</span>
            @endif
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
