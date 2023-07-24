@extends('templates.layout')
@section('content')
    <h1>{{ $title }}</h1>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
    <form action="{{ route('add_category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Name" name="name" ><br>



        <img id="image_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
        alt="Products image" style="max-width: 200px; max-height: 100px">
        <input type="file" name="image" accept="image/*"
        class="@error('image') is-invalid @enderror" id="image">
        <br>
        <button type="submit">Add new</button>
    </form>
@endsection
