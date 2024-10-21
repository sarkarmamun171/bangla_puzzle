@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4>Category List</h4>
        </div>
        @if (session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Category Name</th>
                    <th>Category Iamge</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $sl=>$category)
                    <tr>
                        <td>{{ $categories->firstitem()+$sl }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td><img src="{{ asset('uploads/category') }}/{{ $category->category_img }}"  width="50" alt=""></td>
                        <td>
                            <div class="d-flex">
                                <a  href="{{ route('edit.category',$category->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-pencil"></i></a>
                                &nbsp; &nbsp;
                                    <a href="{{ route('delete.category',$category->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('store.category') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (session('success'))
                    <div class="alert alert-info">{{ session('success') }}</div>
                @endif
                <div class="mb-3">
                    <label for="category_name" class="form label">Category Name</label>
                    <input type="text" name="category_name"  class="form-control">
                </div>
                <div class="mb-3">
                    <label for="category_img" class="form label">Category Image</label>
                    <input type="file" name="category_img"  class="form-control">
                </div>
                <div class="mb-3">
                   <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
