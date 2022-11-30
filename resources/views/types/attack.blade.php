@extends('layout.app')
@section('content')
    <h1>En attaque</h1>
    <div style="column-count: 2;">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Types</th>
                </tr>
            </thead>
            <tbody>
                <div>
                    <select name="type_one" id="inputTypeOne" class="form-select">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @if($type1 == $type->id) selected @endif>{{ ucfirst($type->name) }}</option>
                        @endforeach
                    </select>
                    <select name="type_one" id="inputTypeOne" class="form-select">
                        <option value="-1">None</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @if($type2 == $type->id) selected @endif>{{ ucfirst($type->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <tr>
                    <td>{{ $type1 }}</td>
                    <td>{{ $type2 }}</td>
                    <td>[TODO] A remplir avec la future table types</td>
                    <td>Idem</td>
                </tr>
                <tr>
                    <td>[TODO] A remplir avec la future table types</td>
                    <td>Idem</td>
                </tr>
            </tbody>
        </table>
        <h2>Inflige</h2>
    </div>
@endsection
