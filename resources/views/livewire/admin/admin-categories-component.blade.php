<div>
        <main class="main">
                <div class="page-header breadcrumb-wrap">
                    <div class="container">
                        <div class="breadcrumb">
                        <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                            <span></span> Categories
                          
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
                                                        Categories
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="{{route('admin.category.add')}}" class="btn btn-success btn-sm float-end">Add
                                                            Category</a>
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
                                                    <th>Slug</th>
                                                    <th>Popular</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = ($categories->currentPage() - 1) * $categories->perPage();
                                                @endphp
                                                @foreach($categories as $cat)
                                                    <tr>
                                                    <td>{{++$i}}</td>
                                                    <td><img src="{{asset('assets/imgs/categories')}}/{{$cat->image}}" width="80" alt="{{$cat->name}}" /></td>
                                                    <td>{{$cat->name}}</td>
                                                    <td>{{$cat->slug}}</td>
                                                    <td>{{$cat->is_popular == 1 ? 'YES' : 'NO' }}</td>
                                                    <td>
                                                        <a href="{{route('admin.category.edit',$cat->id)}}" class="text-info"> Edit</a>

                                                        <a href="#" class="text-danger ml-2" onclick="deleteConfirmation({{$cat->id}})">Delete</a>
                                                    </td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$categories->links()}}
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
                        <button type="button" class="btn btn-secondary" onclick="deleteCategory()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>
        function deleteConfirmation(id) {
            @this.set('category_id',id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteCategory() {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>

@endpush
