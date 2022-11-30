<!-- TODO mettre vueJS -->

@extends('layout.app')
@section('content')
<div class="row mb-3">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Sign in
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="name">
                                    Nom d'utilisateur
                                </label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group col-12">
                                <label for="password">
                                    Mot de passe
                                </label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="form-group col-12">
                                <label for="password2">
                                    Mot de passe
                                </label>
                                <input type="password" id="password2" name="password2" required>
                            </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger form-group col-12">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
