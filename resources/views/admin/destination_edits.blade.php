@extends('layouts.backend')
@section('content')
    <style>
        .parent_tinymce{
            width: 100%;
            min-height: 400px;
        }
    </style>
    <div class="row">
        <div class="col-md-12 div_info">
            <div class="tile">
                <div class="tile-body">
                    <form class="form-horizontal" id="pages-form-edit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="rice">Name</label>
                                    <input class="form-control" type="text" name="des_name" id="des_name" maxlength="100"
                                           value="{{$dataDes->name}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"
                                           for="page_name">Prefecture</label>
                                    <input class="form-control" type="text" name="prefecture" maxlength="100" id="prefecture"
                                           value="{{$dataDes->prefecture}}"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label"
                                       for="description">Content</label>
                                <div class="form-group" style="display: flex;">
                                    <div class="parent_tinymce">
                                        <textarea class="tinymce" name="page_content"
                                                  id="page_content">{{$dataDes->content}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                            <button type="button" class="btn btn-primary update">Save</button>
                            <button id="pages-form-reset" class="btn btn-warning"
                                    type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("js")
    <script src="{{asset('lib/backend/tinymce/js/tinymce/tinymce.min.js')}}" ></script>
    <script src="{{asset('lib/backend/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script>
        var _routeEdit = '{{route("admin.destination.do_edit")}}';
        var _desId = '{{$dataDes->id}}';
        $(document).ready(function(){
            tinymce.init({
                selector: '#page_content',
                plugins: [
                    "advlist autolink image lists charmap print hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                    "save table directionality template paste",
                    "image code","preview"
                ],
                /* toolbar */
                toolbar: "insertfile undo redo | styleselect | bold underline italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image  | forecolor backcolor | preview",
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                width: "100%",
                height: 400,
                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function () {
                        var file = this.files[0];
                        var reader = new FileReader();

                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), {title: file.name});
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                }
            });
        });
        //============================event reset=======================
        $(document).on('click', '#pages-form-reset', function () {
            window.location.reload();
        });
        //=======================event save/update ==============================================
        $(document).on("click", ".update", function () {
            _commonClearError();
            let formData = new FormData();
            formData.append("des_id", _desId);
            formData.append("name", $("#des_name").val());
            formData.append("prefecture", $("#prefecture").val());
            formData.append("page_content", tinymce.get("page_content").getContent());
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                url: _routeEdit,
                data: formData,
                beforeSend: _showAjaxLoading(),
                success: function (result) {
                    _hideAjaxLoading();
                    if (result.status == _statusOK) {
                        toastr.success(result.message, '', {
                            timeOut: 2000,
                            closeButton: true,
                        });
                    } else {
                        _commonShowError(result.data);
                    }
                }
            });
        });


    </script>
@endpush
