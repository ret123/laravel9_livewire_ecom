<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span>Edit Product

                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        EditProduct
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products')}}"
                                            class="btn btn-success btn-sm float-end">All
                                            Products</a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="updateProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input wire:model="name" wire:keyup="generateSlug" type="text" name="name"
                                            class="form-control" placeholder="Enter Product name">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input wire:model="slug" type="text" name="slug" class="form-control"
                                            placeholder="Enter Product slug">
                                        @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Short Description</label>
                                        <textarea name="short_description" wire:model="short_description"
                                            class="form-control" placeholder="Enter Product short description">
                                            </textarea>
                                        @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label"> Description</label>
                                        <textarea name="description" wire:model="description" class="form-control"
                                            placeholder="Enter Product  description">
                                                </textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label"> Regular Price</label>
                                        <input wire:model="regular_price" type="text" name="regular_price"
                                            class="form-control" placeholder="Enter Product Price">
                                        @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label"> Sale Price</label>
                                        <input wire:model="sale_price" type="text" name="sale_price"
                                            class="form-control" placeholder="Enter Product Sale Price">
                                        @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label"> SKU</label>
                                        <input wire:model="sku" type="text" name="sku" class="form-control"
                                            placeholder="Enter Product SKU">
                                        @error('sku')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label"> Stock Status</label>
                                        <select wire:model="stock_status" name="stock_status" class="form-control">
                                            <option value="instock">In Stock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label">Featured </label>
                                        <select wire:model="featured" name="featured" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label"> Quantity</label>
                                        <input wire:model="quantity" type="text" name="quantity" class="form-control"
                                            placeholder="Enter Product Quantity">
                                        @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label"> Image</label>
                                        <input wire:model="newImage" type="file" name="newImage" calss="form-control"
                                            placeholder="Enter Product image">
                                        @if($newImage)
                                        <img src="{{$newImage->temporaryUrl()}}" width="120" alt="" />
                                        @else
                                    <img src="{{asset('assets/imgs/products')}}/{{$image}}" width="120" alt="" />
                                        @endif
                                        @error('newImage')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Category </label>
                                        <select name="category_id" wire:model="category_id" class="form-control">
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>