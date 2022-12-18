@extends('layout.app')

@section('content')
<div class="col-12 btn-back">
    <a href="{{ route('pokemon.index') }}" class="btn btn-primary">Retour</a>
</div>
<div class="row mb-3">
    <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Editer Pokemon
                        {{ $pokemon->types[0]['id'] }}
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="inputName">Nom</label>
                                <input type="text" name="name" class="form-control" id="inputName" value="{{ $pokemon->name }}">
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-6">
                                    <label for="inputHp">Vie</label>
                                    <input type="number" name="hp" class="form-control" id="inputHp" min="1" max="255" value="{{ $pokemon->hp }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputAttack">Attaque</label>
                                    <input type="number" name="attack" class="form-control" id="inputAttack" min="1" max="255" value="{{ $pokemon->attack }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputDefense">Défence</label>
                                    <input type="number" name="defense" class="form-control" id="inputDefense" min="1" max="255" value="{{ $pokemon->defense }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputSpecialAttack">Attaque spé</label>
                                    <input type="number" name="special_attack" class="form-control" id="inputSpecialAttack" min="1" max="255" value="{{ $pokemon->special_attack }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputSpecialDefense">Défence spé</label>
                                    <input type="number" name="special_defense" class="form-control" id="inputSpecialDefense" min="1" max="255" value="{{ $pokemon->special_defense }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputSpeed">Vitesse</label>
                                    <input type="number" name="speed" class="form-control" id="inputSpeed" min="1" max="255" value="{{ $pokemon->speed }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputTypeOne">Type 1</label>
                                    <select name="type_one" id="inputTypeOne" class="form-select" aria-label="Pokemon type one">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @if ($type->id == $pokemon->types[0]['id']) selected="selected" @endif>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputTypeTwo">Type 2</label>
                                    <select name="type_two" id="inputTypeTwo" class="form-select" aria-label="Pokemon type two">
                                        <option value="-1">None</option>
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @if (count($pokemon->types) > 1 && $type->id == $pokemon->types[1]['id']) selected @endif>
                                            {{ $type->name }}
                                        </option>
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