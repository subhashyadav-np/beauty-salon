@extends('layouts.backend', ['title' => 'Testimonials'])

@section('content')
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Review</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($testimonials as $item)
                        <tr>
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                {{ Str::of($item->review)->limit(50) }}
                            </td>
                            <td>
                                <div class="table-img flex-center">
                                    <img src="{{ asset('images/testimonials/' . $item->avatar) }}" />
                                </div>
                            </td>
                            <td style="display: flex; justify-content: space-around; align-items:center;">
                                <button onclick="editTestimonial({{ $item->id }})" class="btn btn-info btn-sm">
                                    <span class="fa fa-edit"></span>
                                </button>
                                <form style="display: inline;" action="{{route('testimonial.destroy',['testimonial'=>$item->id])}}" method="POST">
                                    @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure to delete this testimonial?')" class="btn btn-danger btn-sm">
                                            <span class="fa fa-trash-alt"></span>
                                        </button>
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-12 my-3">
            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="addTestimonial()"><i class="fa fa-plus"></i> Add Testimonial</button>
        </div>

        <!-- sample modal content -->
        <div id="addTestimonialData" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="addTestimonialDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addTestimonialForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="formMethod"></div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTestimonialDataLabel"><span id="testimonialModalTitle">Add</span>
                                Testimonial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="testName">Name</label>
                                <input type="text" name="name" class="form-control @error('name') border-danger @enderror"
                                    id="testName" placeholder="John Doe" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="testAvatar">Avatar</label>
                                <input type="file" class="filestyle" name="avatar" id="testAvatar"
                                    data-btnClass="btn-primary">
                                @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="testReview">Review</label>
                                <textarea name="review" id="testReview" class="form-control" required cols="30" rows="4"
                                    placeholder="Awesome Review"></textarea>

                                @error('review')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        {{-- Delete FORM --}}
        {{-- <form action="" method="post"></form> --}}

    </div>
    <!-- end row -->


@endsection

@section('scripts')
    <script src="{{ asset('backend/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>

    <script>
        function editTestimonial(id) {
            $.ajax({
                type: "get",
                url: "testimonial/" + id,
                dataType: 'json',
                success: function(response) {
                    $('#testName').val(response.name);
                    $('#testReview').html(response.review);
                    $('#addTestimonialForm').attr('action', '/admin/testimonial/' + id);
                    $('#formMethod').html('<input name="_method" type="hidden" value="PUT">')
                    $('#testimonialModalTitle').html('Update');
                    $('#addTestimonialData').modal('show');
                }
            });

        }

        function addTestimonial() {
            $('#testName').val('');
            $('#testReview').html(' ');
            $('#addTestimonialForm').attr('action', '/admin/testimonial');
            $('#formMethod').html('')
            $('#testimonialModalTitle').html('Add');
            $('#addTestimonialData').modal('show');


        }

    </script>
@endsection
