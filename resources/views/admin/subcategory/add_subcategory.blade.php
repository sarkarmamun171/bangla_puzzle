@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Subcategory List</h4>
            </div>
            <div class="card-body">
                @if (session('deleted'))
                    <div class="alert alert-danger">{{ session('deleted') }}</div>
                @endif
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-6">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h4>{{ $category->category_name }}</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Subcategory Name</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach (App\Models\Subcategory::where('category_id', $category->id)->get() as $subcategory)
                                            <tr>
                                                <td>{{ $subcategory->Subcategory_name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('edit.subcategory', $subcategory->id) }}"
                                                            class="btn btn-info shadow btn-xs sharp del_btn"><i
                                                                class="fa fa-pencil"></i></a>
                                                        &nbsp; &nbsp;
                                                        <a href="{{ route('delete.subcategory', $subcategory->id) }}"
                                                            class="btn btn-danger shadow btn-xs sharp del_btn"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Add Subcategory</h4>
            </div>
            <div class="card-body">
                @if (session('exist'))
                    <div class="alert alert-warning">{{ session('exist') }}</div>
                @endif
                <form action="{{ route('store.subcategory') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subcategory Name</label>
                        <input type="text" name="subcategory_name" class="form-control">
                        @error('subcategory_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Subcategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
