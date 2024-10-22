@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Product List</h4>
        </div>
        <div class="card-body">
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Subcategory Name</th>
                    <th>Product Name</th>
                    <th>Old Price</th>
                    <th>Discount(%)</th>
                    <th>New Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($products as $sl=>$product)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $product->rel_to_category->category_name }}</td>
                        <td>{{ $product->rel_to_subcategory->Subcategory_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->after_discount }}</td>
                        <td>
                            <img src="{{ asset('uploads/product/preview/') }}/{{ $product->preview_img }}" alt="" srcset="" width="50">
                        </td>
                        <td>
                            <div class="d-flex">
                                <a  href="{{ route('product.edit',$product->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-pencil"></i></a>
                                &nbsp; &nbsp;
                                    <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
