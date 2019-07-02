@extends('layout.default')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3 class="card-title">Enregistrement</h3>
                <p class="card-category">Agents
                    {{-- <a target="_blank" href="#">Robert McIntosh</a>. Please checkout the --}}
                    {{-- <a href="#" target="_blank">full documentation.</a> --}}
                </p>
            </div>
            <div class="card-body">
                <div class="row pt-5"></div>
                
                <form method="POST" action="{{route('agents.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputMatricule">Matricule</label>
                        <input type="matricule" name="matricule" class="form-control" id="exampleInputMatricule" placeholder="Entrer Matricule">
                        @if ($errors->has('matricule'))
                        @foreach ($errors->get('matricule') as $message)
                        <p class="text-danger">{{ $message }}</p>
                        @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="input-nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="input-nom" aria-describedby="NomHelp" placeholder="Entrer Nom">
                        <small id="input-nom-help" class="form-text text-muted">
                            @if ($errors->has('nom'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('nom') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </small>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPrenom">Prenom</label>
                        <input type="prenom" name="prenom" class="form-control" id="exampleInputPrenom" aria-describedby="prenomHelp" placeholder="Enter Prenom">
                        <small id="prenomHelp" class="form-text text-muted">
                            @if ($errors->has('prenom'))
                            @foreach ($errors->get('prenom') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                        <small id="emailHelp" class="form-text text-muted">
                            @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputlogin">Login</label>
                        <input type="login" name="login" class="form-control" id="exampleInputlogin" aria-describedby="loginHelp" placeholder="Enter Login">
                        <small id="loginHelp" class="form-text text-muted">
                            @if ($errors->has('^login'))
                            @foreach ($errors->get('login') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="Enter Password">
                        <small id="passwordHelp" class="form-text text-muted">
                            @if ($errors->has('^password'))
                            @foreach ($errors->get('password') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                   
                  <!--   <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            Option one is this
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                     -->
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
                <div class="row justify-content-center">
                    @if ($errors->any())
                  
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection