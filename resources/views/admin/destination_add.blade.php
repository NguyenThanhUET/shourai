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
            border: 1px solid #5969ff;
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
                            <div class=" col-md-4">
                                <div class="col-md-12 col-ms-12 div_info">
                                    <div class="tile">
                                        <div class="tile-body">
                                            <div class="form-group">
                                                <input id="file" name="image" type="file" class="form-control" accept="image/*"/>
                                                <div id="preview">
                                                    <img class="thumb square" data-path=""
                                                         data-src="{{asset('img/icon-no-image.svg')}}" src="{{asset('img/icon-no-image.svg')}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tile-footer text-center">
                                            <label for="file" class="custom-file-upload btn btn-outline-secondary camera" name="image">
                                                <i class="fa fa-picture-o"></i> Choose Image
                                            </label>
                                            <label class="reset_image btn btn-outline-secondary camera"
                                                   style='{{!empty($prefecture->src) ? "" : "display:none;"}}'>
                                                <i class="fa fa-close"></i> Reset
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="rice">Name</label>
                                        <input class="form-control" type="text" name="des_name" id="des_name"
                                               maxlength="100"
                                               value=""/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="page_name">Prefecture</label>
                                        <select class="form-control" type="text" name="prefecture" maxlength="100"
                                                id="prefecture">
                                            <option value=''>Select prefecture</option>
                                            <?php foreach ($dataPrefecture as $prefecture) { ?>
                                            <option value="{{$prefecture->id}}">{{$prefecture->name}}</option>
                                            <?php } ?>
                                        </select>
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
        var _routeAdd = '{{route("admin.destination.do_add")}}';
        var must_delete_old_image = null;
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
            formData.append("des_name", $("#des_name").val());
            formData.append("prefecture", $("#prefecture").val());
            formData.append("page_content", tinymce.get("page_content").getContent());
            let image = $('input[type=file]')[0].files[0];
            image = (typeof(image) === "undefined")?"":image;
            formData.append("oldImgSrc", $("img.thumb").data("path"));
            if (must_delete_old_image != null) formData.append("must_delete_old_image", must_delete_old_image);
            /* xu ly tren IE, khi khong chon file de upload thi ko append vao form */
            if (image != null) formData.append("image", image);
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
                        location.href = '{{route('admin.destination.index')}}';
                    } else {
                        _commonShowError(result.data);
                    }
                }
            });
        });
        //upload image
        function handleFileSelect() {
            let input = this;
            if (input.files && input.files.length) {
                let file = input.files[0];
                if (file.size > 15000000) // 15MB
                {
                    document.getElementById("file").value = "";
                    $.alert({
                        title: 'エラー',
                        type : "orange",
                        icon          : 'fa fa-exclamation-circle',
                        content: renderUploadImageResult(file.name + ' - ' + bytesToSize(file.size), 'TOO_LARGE'),
                    });
                    return false;
                } else if (window.localStorage.remainingSpace && file.size > window.localStorage.remainingSpace) {
                    /* check IE local storage remain */
                    document.getElementById("file").value = "";
                    $.alert({
                        title: 'エラー',
                        type : "orange",
                        icon          : 'fa fa-exclamation-circle',
                        content: renderUploadImageResult(file.name, 'NOT_ENOUGH_LOCAL_STORAGE'),
                    });
                    return false;
                }
                this.enabled = false;
                let bufferReader = new FileReader();
                let valid = false;
                bufferReader.onloadend = function(evt) {
                    if (evt.target.readyState === FileReader.DONE) {
                        const uint = new Uint8Array(evt.target.result);
                        let bytes = [];
                        let n = uint.length;
                        for (let index = 0; index < n; index++) {
                            bytes.push(uint[index].toString(16));
                        }
                        const hex = bytes.join('').toUpperCase();
                        switch (hex) {
                            case '89504E47':
                                valid = true;
                                break;
                            // return 'image/png'
                            case '47494638':
                                valid = true;
                                break;
                            // return 'image/gif'
                            default:
                                valid = (hex.indexOf('FFD8FF') >= 0 || hex.indexOf('424D') >= 0);
                                break;
                        }
                        let blobFile = document.getElementById('file').files[0];
                        let fileName = blobFile.name;
                        fileName = fileName.toLowerCase();
                        if (valid && ((fileName.indexOf('.png') >= 0 || fileName.indexOf('.jpg') >= 0 || fileName.indexOf('.jpeg') >= 0 || fileName.indexOf('.bmp') >= 0 || fileName.indexOf('.gif') >= 0))) {
                            let dataUrlReader = new FileReader();
                            dataUrlReader.onload = (function (e) {
                                try {
                                    $(".thumb").attr('src', e.target.result);
                                    $(".reset_image").show();
                                    must_delete_old_image = 1;
                                }
                                catch (e) {
                                    document.getElementById("file").value = "";
                                    $.alert({
                                        title: 'エラー',
                                        type : "orange",
                                        icon          : 'fa fa-exclamation-circle',
                                        content: renderUploadImageResult(blobFile.name, 'NOT_ENOUGH_LOCAL_STORAGE'),
                                    });
                                    return false;
                                }
                            });
                            dataUrlReader.readAsDataURL(blobFile);
                        }
                        else {
                            document.getElementById("file").value = "";
                            $.alert({
                                title: 'エラー',
                                type : "orange",
                                icon          : 'fa fa-exclamation-circle',
                                content: renderUploadImageResult(blobFile.name, 'INVALID_IMAGE_FILE'),
                            });
                            return false;
                        }
                    }
                };
                const blob = file.slice(0, 4);
                bufferReader.readAsArrayBuffer(blob);
            }
        }
        $('#file').change(handleFileSelect);
        //reset imagemust_delete_old_imageavatar
        $(".reset_image").click(function(){
            _commonClearError();
            var src = _defaultImage;
            $("img.thumb").attr('src', src);
            $('#file').val('');
            $(".reset_image").hide();
            must_delete_old_image = 1;
        });
        function renderUploadImageResult(fileName, type = null){
            let content = '';
            let msg = '';
            switch (type) {
                case 'INVALID_IMAGE_FILE':
                    msg = _messageInvalidImageFormat;
                    break;
                case 'TOO_LARGE':
                    msg = _messageFileInvalidOrTooLarge;
                    break;
                case 'NOT_ENOUGH_LOCAL_STORAGE':
                    msg = _messageNotEnoughLocalStorageOnBrowser;
                    break;
            }
            content = content + '<h5>' + msg + '</h5>' + fileName;
            return '' +
                '<div class="justify-content-center">'
                + content
                +'</div>';
        }
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }

    </script>
@endpush
