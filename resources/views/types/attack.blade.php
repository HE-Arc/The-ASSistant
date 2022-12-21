@extends('layout.app')
@section('content')
    <h1>
        En
        @if ($defatt == 'attack')
            attaque
        @else
            défense
        @endif
    </h1>
    <div>
        <div class="types-select">
            <h2>Types</h2>
            <div class="horiz-bar"></div>
            <form action="{{ route($defatt) }}" method="GET" class="types-form">
                <select name="type1" id="inputTypeOne" class="form-select" onchange="submit()">
                    <option value="-1">None</option>
                    @foreach ($types as $type)
                    @if ($type->id != $type2)
                        <option value="{{ $type->id }}" @if ($type1 == $type->id) selected @endif>
                            {{ ucfirst($type->name) }}</option>
                    @endif
                    @endforeach
                </select>
                <select name="type2" id="inputTypeOne" class="form-select" onchange="submit()">
                    <option value="-1">None</option>
                    @foreach ($types as $type)
                    @if ($type->id != $type1)
                        <option value="{{ $type->id }}" @if ($type2 == $type->id) selected @endif>
                            {{ ucfirst($type->name) }}</option>
                    @endif
                    @endforeach
                </select>
            </form>
        </div>
        <div>
            @if (isset($damageTypes))
                @foreach ($damageTypes as $key => $damageByMultiplier)
                    <div class="damages card">
                        <div class="card-header">
                            <h3>
                                @if ($key == 2 || $key == 4)
                                    Super efficace
                                @elseif ($key == 1)
                                    Efficace
                                @elseif ($key == 0.5 || $key == 0.25)
                                    Pas très efficace
                                @elseif ($key == 0)
                                    Inefficace
                                @endif &#40;x{{ $key }}&#41;
                            </h3>
                        </div>
                        <div class="three-col card-body">
                            @foreach ($damageByMultiplier as $type)
                                <span class="poke-style">
                                    <div class="poke-type-color" style="background-color: #{{ $type->color }}">
                                    </div>
                                    <div>
                                        {{ $type->name }}
                                    </div>
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
