@extends('layouts.client')
@section('content')
    <div class="container text-center">
        <h1>Choose the type of product you are interested in:</h1>

        <form method= "POST" action="">
            @csrf
            @foreach ($categories as $category)
                <div class="form-check d-flex" style="margin-left: 600px">
                    <input class="form-check-input" name="category[]" type="checkbox" value="{{ $category->id }}"
                        id="{{ $category->id }}">
                    <label class="form-check-label ms-3" for="{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
            <button class="btn btn-primary">Next</button>
        </form>
    </div>
@endsection
