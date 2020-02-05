@extends('layouts.backend')
@section('content')
    <style>
        .parent_tinymce {
            width: 100%;
            min-height: 400px;
        }
        .thumb{
            width: 100%;
            max-height: 200px;
        }
        #preview{
            min-height: 200px;
        }
        .form-horizontal .control-label{
            text-align: left;
        }
        input[type="file"] {
            display: none;
        }
        .parent_tinymce{
            width: 100%;
        }
        .div_info.div_btn{
            text-align: right;
        }
        .div_info .input-group-text{
            width: 42px;
        }
        .tile{
            min-height: 250px;
        }

    </style>
    <div class="row">
        <div class="col-md-12 div_info">
            <div class="tile">
                <div class="tile-body">
                    <form class="form-horizontal" id="pages-form-edit">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="rice">Name</label>
                                        <input class="form-control" type="text" name="tour_name" id="tour_name"
                                               maxlength="100"
                                               value=""/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="page_name">Start City</label>
                                            <select class="form-control" type="text" name="city_id" maxlength="100"
                                                    id="city_id">
                                                <option value=''>Select prefecture</option>
                                                <?php foreach ($dataPrefecture as $prefecture) { ?>
                                                <option value="{{$prefecture->id}}" >{{$prefecture->name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="page_name">Destination</label>
                                            <select class="form-control" type="text" name="destination" maxlength="100"
                                                    id="destination">
                                                <option value=''>Select destination</option>
                                                <?php foreach ($des as $desRow) { ?>
                                                <option value="{{$desRow->id}}">{{$desRow->name}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="page_name">Start Time</label>
                                            <input type="date" name="start_time" id="start_time" class="datepicker form-control" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="page_name">End Time</label>
                                            <input type="date" name="end_time" id="end_time" class="datepicker form-control" value="">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="page_name">Price</label>
                                            <input type="number" name="price" id="price" class="form-control" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="page_name">Is Top</label>
                                            <div><input type="checkbox" id="is_top" class="pull-left"></div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label"
                                       for="description">Content</label>
                                <div class="form-group" style="display: flex;">
                                    <div class="parent_tinymce">
                                        <textarea class="tinymce" name="page_content"
                                                  id="page_content"></textarea>
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
                                    type="reset">Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("js")
    <script src="{{asset('lib/backend/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('lib/backend/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        var _routeAdd = '{{route("admin.tours.do_add")}}';
        $(document).ready(function () {
            tinymce.init({
                selector: '#page_content',
                plugins: [
                    "advlist autolink image lists charmap print hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                    "save table directionality template paste",
                    "image code", "preview"
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
            formData.append("tour_name", $("#tour_name").val());
            formData.append("city_id", $("#city_id").val());
            formData.append("destination", $("#destination").val());
            formData.append("start_time", $("#start_time").val());
            formData.append("end_time", $("#end_time").val());
            formData.append("price", $("#price").val());
            formData.append("is_top", $("#is_top").prop('checked')==true?1:0);
            formData.append("page_content", tinymce.get("page_content").getContent());
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                url: _routeAdd,
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
