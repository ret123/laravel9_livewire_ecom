<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span>Add New Slide
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
                                        Add New Slide
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.home.slider')}}"
                                            class="btn btn-success btn-sm float-end">All
                                            Slides</a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="addSlide">
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Top Title</label>
                                        <input wire:model="top_title" type="text" class="form-control"
                                            placeholder="Enter top title">
                                        @error('top_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Title</label>
                                        <input wire:model="title" type="text" class="form-control"
                                            placeholder="Enter title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Sub Title</label>
                                        <input wire:model="sub_title" type="text" class="form-control"
                                            placeholder="Enter Sub title">
                                        @error('sub_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Offer</label>
                                        <input wire:model="offer" type="text" class="form-control"
                                            placeholder="Enter Offer">
                                        @error('offer')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Link</label>
                                        <input wire:model="link" type="text" class="form-control"
                                            placeholder="Enter link">
                                        @error('link')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Image</label>
                                        <input wire:model="image" type="file" class="form-control">
                                        @if($image)
                                        <img src="{{$image->temporaryUrl()}}" alt="" width="100">
                                        @endif

                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" wire:model="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>

                                        @error('status')
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