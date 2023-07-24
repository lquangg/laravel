
@extends('templates.layout')
@section('content')
    <h1 class="text-danger">Danh sách danh mục</h1>



    {{-- action bắt theo tên của route --}}
    <form action="{{ route('search') }}" method="POST">
        @csrf
        <input type="text" name="search_name">
        <input type="submit" name="btn_search" value="Search">
    </form>
          <p><a href="http://127.0.0.1:8000/addCategory">Thêm mới</a></p>



    {{-- Hiển thị thông báo --}}
    @if (Session::has('success'))
        {{Session::get('success')}}
    @endif
    @if (Session::has('error'))
        {{Session::get('error')}}
    @endif
<table border="1">
    <tr>
        <td>id</td>
        <td>Tên</td>
        <td>ảnh</td>

        <td>Tuy chọn</td>
    </tr>
 @foreach ($categorys as $pr)

<tr>
        <td>{{$pr->id}}</td>
        <td>{{$pr->name}}</td>
        <td>
            <img width="100px" height="100px" src="{{ $pr->image ?''. Storage::url($pr->image) :'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}" alt="">
        </td>

        <td>
            <a class="btn btn-warning" href="{{ route('edit_category', [ 'id' => $pr->id ]) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('delete_category', [ 'id' => $pr->id ]) }}">Delete</a>
        </td>
    </tr>
 @endforeach

</table>
@endsection
<!-- On tables -->
<table class="table-primary">.a.</table>


<!-- On rows -->
<tr class="table-primary">.b.</tr>


<!-- On cells (`td` or `th`) -->
<tr>
  <td class="table-primary">.c.</td>
  
</tr>
