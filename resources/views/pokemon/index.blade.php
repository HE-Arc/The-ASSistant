@extends('layout.app')
@section('content')
    <h1>Pokédex</h1>
    <br>
    <form action="{{ route('action') }}" class="form-inline" method="GET">
        @csrf
        @if (isset($_GET['search']))
            <input name="search" id="search" value="{{ $_GET['search'] }}" inputmode="search"
                class="typeahead form-control mr-sm-2" type="text" placeholder="Rechercher..." aria-label="Search">
        @else
            <input name="search" id="search" inputmode="search" class="typeahead form-control mr-sm-2" type="text"
                placeholder="Rechercher..." aria-label="Search">
        @endif
        <button class="btn btn-outline-success my-2 my-sm-0 search-group-button" type="submit">Rechercher</button>
        <button class="btn btn-outline-warning my-2 my-sm-0 search-group-button" id="clearButton">Clear</button>
    </form>
    <br>
    @if (count($pokemon) == 0)
        <p> No Pokémon here... </p>
    @else
        @foreach ($pokemon as $pk)
            <div>
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $pk->nameWithFirstLetterCapitalized() }}
                        <br>
                        #{{ $pk->number }}
                    </div>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/images/Pokemon/{{ $pk->number }}.png" alt="{{ $pk->name }}"
                                class="img-fluid rounded-start poke-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="fw-bolder">
                                            Types
                                        </div>
                                        @if (count($pk->types) > 0)
                                            <span class="poke-style">
                                                <div class="poke-type-color"
                                                    style="background-color: #{{ $pk->types[0]['color'] }}">
                                                </div>
                                                <div class="type-name">
                                                    {{ $pk->types[0]['name'] }}
                                                </div>
                                            </span>
                                        @endif
                                        @if (count($pk->types) > 1)
                                            <span class="poke-style">
                                                <div class="poke-type-color"
                                                    style="background-color: #{{ $pk->types[1]['color'] }}">
                                                </div>
                                                <div class="type-name">
                                                    {{ $pk->types[1]['name'] }}
                                                </div>
                                            </span>
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
                                        <div>
                                            <div class="w-100 my-2">
                                                <a class="btn btn-info w-100 m-auto" target="_blank"
                                                    href="https://www.pokepedia.fr/{{ $pk->nameWithFirstLetterCapitalized() }}">Poképédia</a>
                                            </div>
                                            <div class="w-100 my-2">
                                                @if (count($pk->types) <= 1)
                                                    <a class="btn btn-info w-100 m-auto"
                                                        href="{{ route('attack', ['type1' => $pk->types[0]['id']]) }}">
                                                    @else
                                                        <a class="btn btn-info w-100 m-auto"
                                                            href="{{ route('attack', ['type1' => $pk->types[0]['id'], 'type2' => $pk->types[1]['id']]) }}">
                                                @endif
                                                En
                                                attaque</a>
                                            </div>
                                            <div class="w-100 my-2">
                                                <a class="btn btn-info w-100 m-auto" href="{{ route('defense') }}">En
                                                    défense</a>
                                            </div>
                                            @if (!empty(session('username')))
                                                <div class="w-100 my-2">&nbsp;</div>
                                                <div class="w-100 my-2">
                                                    <form action="{{ route('pokemon.edit', $pk->id) }}" method="GET">
                                                        <button class="btn btn-info w-100 m-auto" type="submit">Éditer
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="orange" class="bi bi-pencil-fill"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="w-100 my-2 ">
                                                    <form action="{{ route('pokemon.destroy', $pk->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-info w-100 m-auto" type="submit">Supprimer
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="#CF0000" class="bi bi-trash-fill"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                            </svg>
                                                        </button>
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
    @endif
    {!! $pokemon->links() !!}
    @if (!empty(session('username')))
        <a href="{{ route('pokemon.create') }}" class="btn btn-success create-pokemon-button"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg> Nouveau Pokémon</a>
    @endif
@endsection
