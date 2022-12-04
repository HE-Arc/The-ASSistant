@extends('layout.app')
@section('content')
    <h1>En attaque</h1>
    <div style="column-count: 2;">
        <h1>Types</h1>
        <div>
            <select name="type_one" id="inputTypeOne" class="form-select">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if($type1 == $type->id) @endif>{{ ucfirst($type->name) }}</option>
                @endforeach
            </select>
            <select name="type_one" id="inputTypeOne" class="form-select">
                <option value="-1">None</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if($type2 == $type->id) @endif>{{ ucfirst($type->name) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            @foreach ($damageTypes as $key => $damageByMultiplier)
            <div>
                <h2>x{{$key}}</h2>
            </div>
            @foreach ($damageByMultiplier as $type)
            <div>
                {{ $type->name }}
            </div>
            @endforeach

            @endforeach
        </div>
    </div>
@endsection
