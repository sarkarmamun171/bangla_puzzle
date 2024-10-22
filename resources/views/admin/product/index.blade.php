@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Add New Product</h3>
                <a href="#" class="btn btn-primary"><i class="fa fa-list"></i> Product List</a>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Seclect Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Sub Category</label>
                                <select name="subcategory" id="subcategory" class="form-control">
                                    <option value="">Seclect Sub Category</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->Subcategory_name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name">
                                @error('product_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price">
                                @error('price')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Discount</label>
                                <input type="number" class="form-control" name="discount">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Short Description</label>
                                <textarea id="short_desp" name="short_desp" type="text" class="form-control"></textarea>
                            </div>
                            @error('short_desp')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Long Description</label>
                                <textarea id="long_desp" name="long_desp" type="text" class="form-control"></textarea>
                            </div>
                            @error('long_desp')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Preview Image</label>
                                <input type="file" class="form-control" name="preview_img"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></input>
                            </div>
                            @error('preview')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div class="my-2">
                                <img width="100" src="" id="blah" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 m-auto">
                            <div class="mb-3">
                                <button type="submit" class="btn-primary p-3 rounded">Add New Product</button>
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
        $('#category').change(function() {
            var category_id = $(this).val();
            // alert(category_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/getSubcategory',
                data:{'category_id':category_id},
                success:function(data){
                   $('#subcategory').html(data);
                }
            })

        })
    </script>
    <script>
        $(document).ready(function() {
            $('#short_desp').summernote();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#long_desp').summernote();
        });
    </script>
@endsection
