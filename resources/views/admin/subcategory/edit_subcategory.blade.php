@extends('layouts.admin')

@section('content')
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">Edit Subcategory</div>
        <div class="card-body">
            <form action="{{ route('update.subcategory',$subcategories->id) }}" method="POST">
                @if (session('updated'))
                    <div class="alert alert-success">{{ session('updated') }}</div>
                @endif
                @if (session('exist'))
                    <div class="alert alert-danger">{{ session('exist') }}</div>
                @endif
                @csrf

                <div class="mb-3">
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option {{ $category->id  == $subcategories->category_id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Subcategory Name</label>
                    <input type="text" name="subcategory_name" class="form-control" value="{{$subcategories->Subcategory_name}}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Subcategory</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
