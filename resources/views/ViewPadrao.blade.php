<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Biblioteca</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body>
        <div style="background-color: #F5F5F5;">

            <div class ="container col-xl-12">
                <div class ="navbar-header">
                    <a href ="/ConsultaLivros" class ="navbar-brand">Biblioteca</a>
                </div>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/ConsultaCategorias" id="buscar">Consultar Categorias</a>
                                <a class="dropdown-item" href="/AdicionaCategorias">Cadastrar Categorias</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Autores</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/ConsultaAutores" id="buscar">Consultar Autores</a>
                                <a class="dropdown-item" href="/AdicionaAutores">Cadastrar Autores</a>

                            </div>
                        </li>                        

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Livros</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/ConsultaLivros" id="buscar">Consultar Livros</a>
                                <a class="dropdown-item" href="/AdicionaLivros">Cadastrar Livros</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--<div class="container">-->
            @yield('content')
            <!--</div>-->
        </div>
        <script type="text/javascript" src="{{ asset('/js/jQuery.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield('scripts')

    </body>
</html>
