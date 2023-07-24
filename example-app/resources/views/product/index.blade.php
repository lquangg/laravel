
@extends('templates.layout')
@section('content')
    <h1 class="text-danger">Danh sách sản phẩm</h1>

 

    {{-- action bắt theo tên của route --}}
    <form action="{{ route('search') }}" method="POST">
        @csrf
        <input type="text" name="search_name">
        <input type="submit" name="btn_search" value="Search">
    </form>
          <p><a href="http://127.0.0.1:8000/addProducts">Thêm mới</a></p>



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
        <td>Giá</td>
        <td>Mô tả</td>
        <td>Tuy chọn</td>
    </tr>
 @foreach ($product as $pr)

<tr>
        <td>{{$pr->id}}</td>
        <td>{{$pr->name}}</td>
        <td>
            <img width="100px" height="100px" src="{{ $pr->image ?''. Storage::url($pr->image) :'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}" alt="">
        </td>
        <td>{{$pr->gia}}</td>
        <td>{{$pr->mota}}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('edit_products', [ 'id' => $pr->id ]) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('delete_products', [ 'id' => $pr->id ]) }}">Delete</a>
        </td>
    </tr>
 @endforeach

</table>
@endsection
