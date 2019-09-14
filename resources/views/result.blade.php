@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header"><b>{{ $searchResults->count() }} Resultados encontrados para "{{ request('query') }}"</b></div>
  
    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
    @if ($type == "categories")
    <div class="card-body">    
        <h2><i class="fas fa-folder-open"></i>Categorias</h2>

            @foreach($modelSearchResults as $searchResult)
            <ul>
                <li class="result-link">
                    <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                </li>
            </ul>
            @endforeach
    </div>
    @endif
    @if ($type == "files")
    <div class="card-body">    
        <h2><i class="fas fa-folder-open"></i>Documentos</h2>

            @foreach($modelSearchResults as $searchResult)
            <ul>
                <li class="result-link">
                    <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                </li>
            </ul>
            @endforeach
    </div>
    @endif
    @if ($type == "tagging_tagged")
    <div class="card-body">    
        <h2><i class="fas fa-folder-open"></i>Por Tags</h2>

            @foreach($modelSearchResults as $searchResult)
            <ul>
                <li class="result-link">
                    <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                </li>
            </ul>
            @endforeach
    </div>
    @endif
    @endforeach
    
</div>
@endsection
