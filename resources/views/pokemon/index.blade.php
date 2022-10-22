@extends('layout.app')

@section('content')
<h1>Pokemons</h1>
@foreach ($pokemon as $pk)
    <div>
        <div class="card">
            <div class="card-header">
                {{$pk->nameWithFirstLetterCapitalized()}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div>
                        image
                    </div>
                    <div class="col">
                        <div class="fw-bolder">
                            Types
                        </div>
                        <div>
                            Type 1
                        </div>
                        <div>
                            Type 2
                        </div>
                    </div>
                    <div class="col text-right">
                        <div>
                            PV
                        </div>
                        <div>
                            Attaque
                        </div>
                        <div>
                            Défense
                        </div>
                        <div>
                            Attaque Spé
                        </div>
                        <div>
                            Défense Spé
                        </div>
                        <div>
                            Vitesse
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            {{$pk->hp}}
                        </div>
                        <div>
                            {{$pk->attack}}
                        </div>
                        <div>
                            {{$pk->defense}}
                        </div>
                        <div>
                            {{$pk->special_attack}}
                        </div>
                        <div>
                            {{$pk->special_defense}}
                        </div>
                        <div>
                            {{$pk->speed}}
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <a class="btn btn-info" href="{{ route('attack') }}">En attaque</a>
                        </div>
                        <br>
                        <div>
                            <a class="btn btn-info" href="{{ route('defense') }}">En défense</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
{!! $pokemon->links() !!}

<a href="{{ route('pokemon.create') }}" class="btn btn-info" style="margin-top: 15px;">Nouveau Pokémon</a>
@endsection
