@extends('layout.app')

@section('content')
<h1>Pokemons</h1>
@foreach ($pokemon as $pk)
    <div class="row mt-12">
        <div class="card">
            <div class="card-header">
                {{$pk->name}}
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group">
                        image
                    </div>
                    <div class="form-col">
                        <div class="form-row">
                            Types
                        </div>
                        <div class="form-row">
                            Type 1
                        </div>
                        <div class="form-row">
                            Type 2
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-row">
                            PV
                        </div>
                        <div class="form-row">
                            Attaque
                        </div>
                        <div class="form-row">
                            Défense
                        </div>
                        <div class="form-row">
                            Attaque Spé
                        </div>
                        <div class="form-row">
                            Défense Spé
                        </div>
                        <div class="form-row">
                            Vitesse
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-row">
                            {{$pk->hp}}
                        </div>
                        <div class="form-row">
                            {{$pk->attack}}
                        </div>
                        <div class="form-row">
                            {{$pk->defense}}
                        </div>
                        <div class="form-row">
                            {{$pk->special_attack}}
                        </div>
                        <div class="form-row">
                            {{$pk->special_defense}}
                        </div>
                        <div class="form-row">
                            {{$pk->speed}}
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-row">
                            Pokepedia
                        </div>
                        <div class="form-row">
                            En attaque
                        </div>
                        <div class="form-row">
                            En défense
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
{!! $pokemon->links() !!}
@endsection
