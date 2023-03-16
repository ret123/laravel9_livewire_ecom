<div>
        <main class="main">
                <div class="page-header breadcrumb-wrap">
                    <div class="container">
                        <div class="breadcrumb">
                        <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                            <span></span> Slides
                          
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
                                                        Slides
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="{{route('admin.home.slider.add')}}" class="btn btn-success btn-sm float-end">Add
                                                            New Slide</a>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Top Title</th>
                                                    <th>Title</th>
                                                    <th>Sub Title</th>
                                                    <th>Offer</th>
                                                    <th>Link</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach($slides as $slide)
                                                    <tr>
                                                    <td>{{++$i}}</td>
                                                    <td><img src="{{asset('assets/imgs/slider')}}/{{$slide->image}}" alt="" width="80" /></td>
                                                    <td>{{$slide->top_title}}</td>
                                                    <td>{{$slide->title}}</td>
                                                    <td>{{$slide->sub_title}}</td>
                                                    <td>{{$slide->offer}}</td>
                                                    <td>{{$slide->link}}</td>
                                                    <td>{{$slide->status == 1 ? 'Active' : 'Inactive'}}</td>
                                                    <td>
                                                        <a href="{{route('admin.home.slider.edit',$slide->id)}}" class="text-info"> Edit</a>

                                                        <a href="#" class="text-danger ml-2" onclick="deleteConfirmation({{$slide->id}})">Delete</a>
                                                    </td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                        
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
                        <button type="button" class="btn btn-secondary" onclick="deleteSlide()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>
        function deleteConfirmation(id) {
            @this.set('slide_id',id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteSlide() {
            @this.call('deleteSlide');
            $('#deleteConfirmation').modal('hide');
        }
    </script>

@endpush
