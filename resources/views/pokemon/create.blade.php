@extends('layout.app')

@section('content')
    <div class="col-12 btn-back">
        <a href="{{ route('pokemon.index') }}" class="btn btn-primary">Retour</a>
    </div>
    <div class="row mb-3">
        <form action="{{ route('pokemon.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                    <div class="card">
                        <div class="card-header">
                            Nouveau Pokemon
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="inputName">Nom</label>
                                    <input type="text" name="name" class="form-control" id="inputName">
                                    <label for="inputNumber">Numéro</label>
                                    <input type="number" name="number" class="form-control" id="inputNumber">
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="inputHp">Vie</label>
                                        <input type="number" name="hp" class="form-control" id="inputHp"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputAttack">Attaque</label>
                                        <input type="number" name="attack" class="form-control" id="inputAttack"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputDefense">Défence</label>
                                        <input type="number" name="defense" class="form-control" id="inputDefense"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputSpecialAttack">Attaque spé</label>
                                        <input type="number" name="special_attack" class="form-control"
                                            id="inputSpecialAttack" min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputSpecialDefense">Défence spé</label>
                                        <input type="number" name="special_defense" class="form-control"
                                            id="inputSpecialDefense" min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputSpeed">Vitesse</label>
                                        <input type="number" name="speed" class="form-control" id="inputSpeed"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6 type-select-container">
                                        <label for="inputTypeOne">Type 1</label>
                                        <select name="type_one" id="inputTypeOne" class="form-select"
                                            aria-label="Pokemon type one">
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ ucfirst($type->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6 type-select-container">
                                        <label for="inputTypeTwo">Type 2</label>
                                        <select name="type_two" id="inputTypeTwo" class="form-select"
                                            aria-label="Pokemon type two">
                                            <option value="-1">None</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ ucfirst($type->name) }}</option>
                                            @endforeach
                                        </select>
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
                                <div class="send-container">
                                    <button type="submit" class="btn btn-primary mt-3 btn-send">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
