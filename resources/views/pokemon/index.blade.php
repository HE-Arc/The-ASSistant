@extends('layout.app')

@section('content')
    <h1>Pokemons</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>HP</th>
                <th>Attack</th>
                <th>Defense</th>
                <th>Special Attack</th>
                <th>Special Defense</th>
                <th>Speed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pokemon as $pk)
                <tr>
                    <td>{{ $pk->name }}</td>
                    <td>{{ $pk->hp }}</td>
                    <td>{{ $pk->attack }}</td>
                    <td>{{ $pk->defense }}</td>
                    <td>{{ $pk->special_attack }}</td>
                    <td>{{ $pk->special_defense }}</td>
                    <td>{{ $pk->speed }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{!! $pokemon->links() !!}}
@endsection
