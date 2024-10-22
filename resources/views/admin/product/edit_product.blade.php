@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Edit Product</h3>
            <a href="{{ route('product.list') }}" class="btn btn-primary"><i class="fa fa-list"></i> Product List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update',$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="">Seclect Category</option>
                                @foreach ($categories as $category)
                                {{-- <option value="{{ $category->id }}">{{ $category->category_name }}</option> --}}
                                <option value="{{ $category->id }}" @if($category->id == $products->category_id) selected @endif>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Sub Category</label>
                            <select name="subcategory_id" id="subcategory" class="form-control">
                                <option value="">Seclect Sub Category</option>
                                @foreach ($subcategories as $subcategory)
                                {{-- <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option> --}}
                                <option value="{{ $subcategory->id }}" @if($subcategory->id == $products->subcategory_id) selected @endif>
                                    {{ $subcategory->Subcategory_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('subcategory')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{ $products->product_name }}">
                            @error('product_name')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $products->price }}">
                            @error('price')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Discount</label>
                            <input type="number" class="form-control" name="discount" value="{{ $products->discount }}">

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Short Description</label>
                            <textarea id="short_desp" name="short_desp" type="text" class="form-control">{{ $products->short_desp }}</textarea>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Long Description</label>
                            <textarea id="long_desp" name="long_desp" type="text" class="form-control">{{ $products->long_desp }}</textarea>
                        </div>
                        @error('long_desp')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Preview Image</label>
                            <input type="file" class="form-control" name="preview_img-img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></input>
                        </div>
                        @error('preview')
                         <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        <div class="my-2">
                            {{-- <img width="100" src="" id="blah" alt=""> --}}
                            <img src="{{ asset('uploads/product/preview') }}/{{ $products->preview_img }}" width="100">
                        </div>
                    </div>
                    <div class="col-lg-4 m-auto">
                        <div class="mb-3">
                            <button type="submit" class="btn-primary p-3 rounded">Update Product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
    <script>
        $('#category').change(function(){
            var category_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url:'/getSubcategory2',
                data:{'category_id': category_id},
                success: function(data){
                    $('#subcategory').html(data);
                }

            });

            // alert(category_id);
        })

    </script>

    <script>
        $(document).ready(function() {
            $('#short_desp').summernote();
            // $('#short_desp').summernote('code', '')
            // $('#short_desp').html(escape($('#short_desp').summernote('code', '<b>some</b>')));
            $('#long_desp').summernote();
        });
    </script>
@endsection
