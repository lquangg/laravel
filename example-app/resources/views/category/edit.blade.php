@extends('templates.layout')
@section('content')
    <h1>{{ $title }}</h1>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
    <form action="{{ route('edit_category', ['id' => $detail->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Name" name="name" value="{{ $detail->name }}"><br>


        
        <input type="file" placeholder="Image" name="image" value="<img src="{{ $detail->image ?''. Storage::url($detail->image) :'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg'}}>
        "><br>


        <button type="submit">Cập nhật</button>
    </form>
@endsection
