<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span>Add New Category

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
                                        Add New Category
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.categories')}}"
                                            class="btn btn-success btn-sm float-end">All
                                            Categories</a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="storeCategory">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input wire:model="name" wire:keyup="generateSlug" type="text" name="name"
                                            class="form-control" placeholder="Enter category name">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input wire:model="slug" type="text" name="slug" class="form-control"
                                            placeholder="Enter category slug">
                                        @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input wire:model="image" type="file" name="image" class="form-control"
                                            placeholder="Enter category image">
                                        @if($image)
                                            <img src="{{$image->temporaryUrl()}}" width="120" alt="">
                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="is_popular" class="form-label">Popular</label>
                                        <select name="is_popular" class="form-control" wire:model="is_popular">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('is_popular')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm float-end">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>