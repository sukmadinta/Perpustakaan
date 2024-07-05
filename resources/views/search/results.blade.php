@extends('layouts.app')

@section('content')
    <h1>Hasil Pencarian</h1>
    @if($results->isEmpty())
        <p>Tidak ada hasil untuk "{{ request('query') }}".</p>
    @else
        <ul>
            @foreach($results as $book)
                <li>{{ $book->title }} oleh {{ $book->author }}</li>
            @endforeach
        </ul>
    @endif
@endsection
