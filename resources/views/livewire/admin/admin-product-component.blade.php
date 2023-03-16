<div>
        <main class="main">
                <div class="page-header breadcrumb-wrap">
                    <div class="container">
                        <div class="breadcrumb">
                        <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                            <span></span> Products
                          
                        </div>
                    </div>
                </div>
                <section class="mt-50 mb-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                    @if(Session::has('message'))
                                    <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false,3000)" class="w-full p-3 m-2 bg-green-200 rounded-sm">
                                        {{Session::get('message')}}
                                    </div>
                                    @endif
                                <div class="card">
                                    <div class="card-header">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        Products
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="{{route('admin.product.add')}}" class="btn btn-success btn-sm float-end">Add
                                                            Product</a>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Stock</th>
                                                    <th>Price</th>
                                                    <th>Category</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = ($products->currentPage() - 1) * $products->perPage();
                                                @endphp
                                                @foreach($products as $product)
                                                    <tr>
                                                    <td>{{++$i}}</td>
                                                    <td> <img src="{{asset('assets/imgs/products')}}/{{$product->image}}"
                                                        alt="product image"class="w-10"></td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->stock_status}}</td>
                                                    <td>{{$product->regular_price}}</td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>{{$product->created_at}}</td>
                                                    <td>
                                                    <a href="{{route('admin.product.edit',$product->id)}}" class="text-info"> Edit</a>

                                                        <a href="#" onclick="deleteConfirmation({{$product->id}})" class="text-danger ml-2">Delete</a>
                                                    </td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </main>   
</div>

<div id="deleteConfirmation" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body pb-30 pt-30">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4 class="pb-3">Do you want to delete this record?</h4>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                            <button type="button" class="btn btn-secondary" onclick="deleteProduct()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    
        <script>
            function deleteConfirmation(id) {
                @this.set('product_id',id);
                $('#deleteConfirmation').modal('show');
            }
            function deleteProduct() {
                @this.call('deleteProduct');
                $('#deleteConfirmation').modal('hide');
            }
        </script>
    
    @endpush
    


