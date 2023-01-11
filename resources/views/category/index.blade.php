@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-1 py-3">
            <button class="btn btn-warning my-3" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
        </div>
        <div class="col-11">
            <div class="collapse" id="collapseFilter">
                <div class="card">
                    <div class="card-body">
                        <form class="row align-items-center" method="GET" >
                            <div class="col">
                                <input type="number" name="id" class="form-control" placeholder="Итдентификатор объекта">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Дата с">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Дата по">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary">Применить</button>
                              <a href="{{ route('caregory') }}" class="btn btn-secondary">Сбросить</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<ul>
    @foreach ($categories as $category)
    <li style="list-style-type: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
        </svg>
        {{ $category->stext }} [{{ $category->id }}]
    </li>
    <ul>
        @foreach ($category->childrenCategories as $childCategory)
        @include('category.children', ['child_category' => $childCategory])
        @endforeach
    </ul>
    @endforeach
</ul>
@endsection
