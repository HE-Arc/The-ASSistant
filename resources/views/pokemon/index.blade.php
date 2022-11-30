<!-- TODO Si connecté peut delete, new et edit pas si non connecté -->

@extends('layout.app')
@section('content')
    <h1>Pokédex</h1>
    @foreach ($pokemon as $pk)
        <div>
            <div class="card mb-3">
                <div class="card-header">
                    {{ $pk->nameWithFirstLetterCapitalized() }}
                </div>
                <div class="row g-0">
                    <div class="col-md-4">
                        {{-- <div class="img-fluid rounded-start">
                            image
                        </div> --}}
                        <img src="./images/pokemon/{{ $pk->name }}.png" alt="{{ $pk->name }}"
                            class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="fw-bolder">
                                        Types
                                    </div>
                                    <!-- If it ain't broke don't fix it, this works for now -->

                                    <div class="poke-style" style="background-color: #{{ $pk->types[0]['color'] }}">
                                        <p>
                                            {{ $pk->types[0]['name'] }}
                                        </p>
                                    </div>

                                    @if (count($pk->types) > 1)
                                        <div class="poke-style" style="background-color: #{{ $pk->types[1]['color'] }}">
                                            <p>
                                                {{ $pk->types[1]['name'] }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="col">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="text-start">
                                                PV
                                            </td>
                                            <td class="text-end">
                                                {{ $pk->hp }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                Attaque
                                            </td>
                                            <td class="text-end">
                                                {{ $pk->attack }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                Défense
                                            </td>
                                            <td class="text-end">
                                                {{ $pk->defense }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                Attaque Spé
                                            </td>
                                            <td class="text-end">
                                                {{ $pk->special_attack }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                Défense Spé
                                            </td>
                                            <td class="text-end">
                                                {{ $pk->special_defense }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                Vitesse
                                            </td>
                                            <td class="text-end">
                                                {{ $pk->speed }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col">
                                    {{-- <a class="btn btn-secondary w-100 m-auto collapse-dots text-center"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="collapseButtons" href="#collapseButtons{{ $pk->id }}">
                                        &bull;&bull;&bull;
                                    </a> --}}
                                    {{-- <div class="collapse" id="collapseButtons{{ $pk->id }}"> --}}
                                    <div>
                                        <div class="w-100 my-2">
                                            <a class="btn btn-info w-100 m-auto" target="_blank"
                                                href="https://www.pokepedia.fr/{{ $pk->nameWithFirstLetterCapitalized() }}">Poképédia</a>
                                        </div>
                                        <div class="w-100 my-2">
                                            <a class="btn btn-info w-100 m-auto" href="{{ route('attack', $pk->id) }}">En
                                                attaque</a>
                                        </div>
                                        <div class="w-100 my-2">
                                            <a class="btn btn-info w-100 m-auto" href="{{ route('defense') }}">En
                                                défense</a>
                                        </div>
                                        @if (!empty(session('username')))
                                            <div class="w-100 my-2">
                                                <form action="{{ route('pokemon.edit', $pk->id) }}" method="GET">
                                                <button class="btn-warning" type="submit"><img src="images/edit.png" height ="40" width="40" /></button>
                                                </form>
                                            </div>
                                            <div class="w-100 my-2 ">
                                                <form action="{{ route('pokemon.destroy', $pk->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-danger" type="submit"> <img src="images/delete.png" height ="40" width="40" /></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    @endforeach
    {!! $pokemon->links() !!}
    @if (!empty(session('username')))
        <a href="{{ route('pokemon.create') }}" class="btn btn-success" style="margin-top: 15px; position:sticky; bottom:1rem;">+ Nouveau Pokémon</a>
    @endif
@endsection
