<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <title>Monitor</title>
    </head>
    <body class="bg-light">
        <div class="container mt-5 mb-5">
            <div class="col-8" style="margin: auto">
                <h2>Cadastre-se</h2>
                <form action="{{ route('clients.store') }}" method="POST" class="bg-white p-3">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" class="form-control" name="password" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Razão Social</label>
                        <input type="text" class="form-control" name="businnes_name" id="">
                    </div>
                    <div class="form-group">
                        <label for="">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" placeholder="12.345.678/0001/99" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Whatsapp</label>
                        <input type="text" class="form-control" name="phone" placeholder="(16)99123-4567" id="">
                    </div>
                    <div class="form-group">
                        <label for="">CEP</label>
                        <input type="text" class="form-control" name="zipcode" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Endereço</label>
                        <input type="text" class="form-control" name="address_name" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Número</label>
                        <input type="text" class="form-control" name="address_number" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Estado</label>
                        <input type="text" class="form-control" name="state" id="">
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
        
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        -->
    </body>
</html>