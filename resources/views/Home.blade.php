@extends('layout.app')
@section('content')
    <h1>The ASSistant</h1>
    <img src="images/TheASSistant.png" alt="The ASSistant" class="img-assistant">
    <h2>Contexte</h2>
    <p>
        The ASSistant est un outil de comparaison de Pokémon réalisé dans le cadre du cours de WEB de 3ème année,
        en utilisant le Framework Laravel étudié pendant le workshop.
    </p>
    <p>
        Le site permettra de calculer les dégâts d'une attaque sur un Pokémon selon ses types.
        Il sera aussi possible de consulter les Pokémon et leurs caractéristiques.
    </p>
    <p>
        Le site comprendra :
    </p>
    <ul>
        <li>Une page de comparaison d'attaque et de défense</li>
        <li>Une page pour lister tout les Pokémons</li>
        <li>Une page about et une page de menu</li>
    </ul>
@endsection
