@extends('layout.app')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a href="{{ route('pokemon.index') }}" class="btn btn-primary">Back</a>
        </div>
        <form action="{{ route('pokemon.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                    <div class="card">
                        <div class="card-header">
                            New Pokemon
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName">
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <label for="inputHp">Health</label>
                                        <input type="number" name="hp" class="form-control" id="inputHp"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputAttack">Attack</label>
                                        <input type="number" name="attack" class="form-control" id="inputAttack"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputDefense">Defense</label>
                                        <input type="number" name="defense" class="form-control" id="inputDefense"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputSpecialAttack">Special attack</label>
                                        <input type="number" name="special_attack" class="form-control"
                                            id="inputSpecialAttack" min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputSpecialDefense">Special defense</label>
                                        <input type="number" name="special_defense" class="form-control"
                                            id="inputSpecialDefense" min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputSpeed">Speed</label>
                                        <input type="number" name="speed" class="form-control" id="inputSpeed"
                                            min="1" max="255">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputTypeOne">Type 1</label>
                                        <select name="type_one" id="inputTypeOne" class="form-select"
                                            aria-label="Pokemon type one">
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputTypeTwo">Type 2</label>
                                        <select name="type_two" id="inputTypeTwo" class="form-select"
                                            aria-label="Pokemon type two">
                                            <option value="-1">None</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
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

                                <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
