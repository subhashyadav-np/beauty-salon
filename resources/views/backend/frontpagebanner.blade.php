@extends('layouts.backend', ['title' => 'Homepage Banner'])


@section('content')

    <div class="row">
        <div class="col-12">
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#SN</th>
                        <th>Title</th>
                        <th>Small Title</th>
                        <th>Paragraph</th>
                        <th>Banner</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->small_title}}</td>
                            <td>{{$item->main_title}}</td>
                            <td>{{ Str::of($item->paragraph)->limit(50) }}</td>
                            <td>
                                <div class="table-img flex-center">
                                    <img src="{{ asset('images/homepage/' .$item->banner) }}" />
                                </div>
                            </td>
                            <td style="display: flex; justify-content: space-around; align-items:center;">
                                <button class="btn btn-info btn-sm" onclick="editHomeBanner({{$item->id}});">
                                    <span class="fa fa-edit"></span>
                                </button>
                                <form style="display: inline;" action="{{route('frontbanner.destroy',['frontbanner'=>$item->id])}}" method="POST">
                                    @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure to delete this frontbanner?')" class="btn btn-danger btn-sm">
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
                <button type="button" class="btn btn-primary btn-sm" onclick="addHomeBanner();">
                    <i class="fa fa-plus"></i> Add Homepage Banner
                </button>
        </div>
    </div>



    <!-- Add Category Form Popup // Modal -->
    <div class="modal fade" id="homeBannerFormModal" tabindex="-1" role="dialog"
        aria-labelledby="homeBannerFormModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content res-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="homeBannerFormModalLabel"><span id="HomeBannerFormModalTitle">Add</span>
                        Homepage Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Form-->
                    <form id="addHomeBannerForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div id="formMethod"></div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bolder col-form-label">Samll Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="smTitle" placeholder="samll title here..." id="smTitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bolder col-form-label">Main Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="mTitle" placeholder="main title here..." id="mTitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bolder col-form-label">Paragraph</label>
                            <div class="col-md-9">
                                <textarea name="Bparagraph" id="Bparagraph" cols="30" rows="4" placeholder="type some text here..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bolder col-form-label">Banner</label>
                            <div class="col-md-9">
                                <input type="file" class="filestyle" data-btnClass="btn-primary" name="cover">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                </div>
                </form>

            </div>
        </div>
    </div>

@endsection


@section('scripts')
<script src="{{ asset('backend/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#catType').change(function() {
            if(this.value == "child") {
                $('#parentInpRow').removeClass("removed");
            }else {
                $('#parentInpRow').addClass("removed");
            }
        })
    })
    function addHomeBanner() {
        $('#smTitle').val('');
        $('#mTitle').val('');
        $('#Bparagraph').html('');
        $('#addHomeBannerForm').attr('action', '/admin/frontbanner');
        $('#formMethod').html('')
        $('#HomeBannerFormModalTitle').html('Add');
        $('#homeBannerFormModal').modal('show');
    }
    function editHomeBanner(id) {
        $.ajax({
            type: "get",
            url: "/admin/frontbanner/" + id,
            dataType: 'json',
            success: function(response) {
                $('#smTitle').val(response.small_title);
                $('#mTitle').val(response.main_title);
                $('#Bparagraph').html(response.paragraph);
                $('#addHomeBannerForm').attr('action', '/admin/frontbanner/' + id);
                $('#formMethod').html('<input name="_method" type="hidden" value="PUT">')
                $('#HomeBannerFormModalTitle').html('Update');
                $('#homeBannerFormModal').modal('show');
            }
        });
    }
</script>
@endsection
