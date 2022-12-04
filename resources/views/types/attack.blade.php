@extends('layout.app')
@section('content')
    <h1>En {{ $defatt }}</h1>
    <div style="column-count: 2;">
        <h1>Types</h1>
        <div>
            <form action="{{ route($defatt) }}" method="GET">
                <select name="type1" id="inputTypeOne" class="form-select" onchange="submit()">
                    <option value="-1">None</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if($type1 == $type->id) selected @endif>{{ ucfirst($type->name) }}</option>
                    @endforeach
                </select>
                <select name="type2" id="inputTypeOne" class="form-select" onchange="submit()">
                    <option value="-1">None</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if($type2 == $type->id) selected @endif>{{ ucfirst($type->name) }}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div>
            @if(isset($damageTypes))
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
            @endif
        </div>
    </div>
@endsection
