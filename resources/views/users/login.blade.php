@extends('layout.app')
@section('content')
<div class="row mb-3">
    <form action="{{ route('authenticate') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-5">
                <div class="card">
                    <div class="card-header">
                        Login
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
                                <input type="password"  id="password" name="password" required>
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
                            <button type="submit" class="btn btn-primary mt-3">Login</button>
                            <br>
                            <button type="button" class="btn btn-secondary mt-3" onclick="location.href='{{ route('users.create') }}'">Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
