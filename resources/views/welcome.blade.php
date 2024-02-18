@extends('app')

@section('content')
    <header class="d-flex align-items-center justify-content-center">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand header-home" href="#">
                    <img src="img/doulos-brand.jpg" alt="Logo" width="120" height="96"
                        class="d-inline-block align-text-top">
                    Ministério Doulos
                </a>
            </div>
        </nav>
    </header>
    <section class="container-fluid d-flex align-items-center justify-content-center">

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col d-flex align-items-center justify-content-center">
                <div class="card bg-info bg-gradient">
                    <div class="card-body">
                        <h5 class="card-title">Área de Membros</h5>
                        <p class="card-text">Se você já é membro do Ministério Doulos</p>
                        <a href="#" class="btn btn-dark">Acesse aqui</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <div class="card bg-dark-subtle">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
