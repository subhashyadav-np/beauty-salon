@extends('layouts.backend', ['title' => 'Product Categories'])

@section('styles')
<style>
#parentInpRow.removed{
    display: none;
}
</style>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#SN</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Parent_Category</th>
                        <th>Cover</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td class="text-center">
                                <span class="badge badge-primary">{{$item->type}}</span>
                            </td>
                            <td>{{$item->if_has_parent}}</td>
                            <td>
                                <div class="table-img flex-center">
                                    <img src="{{ asset('images/products/category/' .$item->cover) }}" />
                                </div>
                            </td>
                            <td style="display: flex; justify-content: space-around; align-items:center;">
                                <button class="btn btn-info btn-sm" onclick="editCat({{$item->id}});">
                                    <span class="fa fa-edit"></span>
                                </button>
                                <form style="display: inline;" action="{{route('category.destroy',['category'=>$item->id])}}" method="POST">
                                    @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure to delete this category?')" class="btn btn-danger btn-sm">
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
                <button type="button" class="btn btn-primary btn-sm" onclick="addCat();">
                    <i class="fa fa-plus"></i> Add Category
                </button>
        </div>
    </div>



    <!-- Add Category Form Popup // Modal -->
    <div class="modal fade" id="addCatFormModal" tabindex="-1" role="dialog"
        aria-labelledby="addCatFormModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content res-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCatFormModalLabel"><span id="categoryModalTitle">Add</span>
                        Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Form-->
                    <form id="addCategoryForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div id="formMethod"></div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bolder col-form-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="Category name here..." id="catName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bolder col-form-label">Type</label>
                            <div class="col-md-9">
                                <select class="form-control" name="catType" id="catType">
                                    <option value="parent">Parent Category</option>
                                    <option value="child">Child Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row removed" id="parentInpRow">
                            <label class="col-md-3 font-weight-bolder col-form-label">Parent</label>
                            <div class="col-md-9">
                                <select class="form-control" name="parent" id="parent">
                                    <option value="">--choose parent category--</option>
                                    @foreach ($parents as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bolder col-form-label">Cover</label>
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
    function addCat() {
        $('#catName').val('');
        $('#catType').val('parent');
        $('#parentInpRow').addClass("removed");
        $('#parent').val('');
        $('#addCategoryForm').attr('action', '/admin/category');
        $('#formMethod').html('')
        $('#categoryModalTitle').html('Add');
        $('#addCatFormModal').modal('show');
    }
    function editCat(id) {
        $.ajax({
            type: "get",
            url: "/admin/category/" + id,
            dataType: 'json',
            success: function(response) {
                $('#catName').val(response.name);
                $('#catType').val(response.type);
                if(response.type == 'child') {
                    $('#parentInpRow').removeClass("removed");
                }
                if(response.type == 'parent') {
                    $('#parentInpRow').addClass("removed");
                }
                $('#parent').val(response.if_has_parent);
                $('#addCategoryForm').attr('action', '/admin/category/' + id);
                $('#formMethod').html('<input name="_method" type="hidden" value="PUT">')
                $('#categoryModalTitle').html('Update');
                $('#addCatFormModal').modal('show');
            }
        });
    }
</script>
@endsection
