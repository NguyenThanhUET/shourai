@extends('layouts.frontend')
@section('content')
    <style>
        .book-group {
            margin-bottom: 10px;
        }

        .book-group label {
            margin-bottom: 0px;
        }
        .btn-book{
            width: 200px;
            border-radius: 4px;
        }
        .title{
            color:darkgreen;
            font-size:45px;
            font-weight: border: 2px solid #000;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/common/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/common/common.css')}}">
    <section class="roberto-blog-area section-padding-100-0">

        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12 title">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms"
                         style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                        <!-- <h6>Our Blog</h6> -->
                        予約
                    </div>
                </div>
            </div>

            <div class="form-booking">
                @csrf
                <input type="hidden" name="idtour" id="idtour" size="30" value="{{$idTour}}">
                <div class="col-12">
                    <div class="col-12 book-group">
                        <label for="name"> 名前(*)</label>
                        <input type="text" class="form-control"  name='username' id="username" size="30">
                    </div>
                    <div class="col-12 book-group">
                        <label for="phonenumber"> 電話番号(*)</label>
                        <input type="tel" class="form-control" name="tel" id="tel" maxlength="100">
                    </div>
                    <div class="col-12 book-group">
                        <label for="mail">メール(*)</label>
                        <input type="email" class="form-control" name="email" id="email" maxlength="100">
                    </div>
                    <div class="col-12 book-group">
                        <label for="address">住所</label>
                        <input type="text" class="form-control" name="address" id="address"maxlength="200">
                    </div>
                    <div class="col-12 book-group">
                        <label for="note">備考</label>
                        <textarea class="form-control" name="note" id="note" maxlength="2000"></textarea>
                    </div>
                    <div class="col-12 book-group">
                        <label for="adult">大人</label>
                        <input type="number" class="form-control" name="adult" id="adult" size="5">
                    </div>
                    <div class="col-12 book-group">
                        <label for="child">子供</label>
                        <input type="number" class="form-control" name="child" id="child" size="5">
                    </div>
                    <div class="col-12 book-group text-center">
                        <input type="button" class="form-control btn roberto-btn  btn-book" value="予約">
                    </div>
                </div>
            </div>

            <!-- stop PHP Code -->

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">編集</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 book-group">
                                <label for="name"> 名前</label> : <label id="name-content"></label>
                            </div>
                            <div class="col-12 book-group">
                                <label for="phonenumber"> 電話番号</label> : <label id="tel-content"></label>
                            </div>
                            <div class="col-12 book-group">
                                <label for="mail">メール</label> : <label id="email-content"></label>
                            </div>
                            <div class="col-12 book-group">
                                <label for="address">住所</label> : <label id="address-content"></label>
                            </div>
                            <div class="col-12 book-group">
                                <label for="note">備考</label> : <textarea class="form-control" id="note-content" readonly="true"></textarea>
                            </div>
                            <div class="col-12 book-group">
                                <label for="adult">大人</label> : <label id="adult-content"></label> (人)
                            </div>
                            <div class="col-12 book-group">
                                <label for="child">子供</label> : <label id="child-content"></label> (人)
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-submit" onclick="submit()">次</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">戻る</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="successModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">予約が完了しました！</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>予約が出来ました。電話番号でご連絡させていただきます。</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{route('home')}}"><button type="button" class="btn btn-primary">Ok</button></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @push("js")
        <script src="{{asset('lib/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('js/toastr.min.js')}}"></script>

        <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('js/common/common.js')}}"></script>
        <script>
            var _routeEdit = '{{route('do_booking')}}';
            $(document).ready(function () {
                //=======================event save/update ==============================================
                $(document).on("click", ".btn-book", function () {
                    $("#myModal").find('#name-content').html($('#username').val());
                    $("#myModal").find('#tel-content').html($('#tel').val());
                    $("#myModal").find('#email-content').html($('#email').val());
                    $("#myModal").find('#address-content').html($('#address').val());
                    $("#myModal").find('#note-content').val($('#note').val());
                    $("#myModal").find('#adult-content').html(1*$('#adult').val());
                    $("#myModal").find('#child-content').html(1*$('#child').val());

                    $("#myModal").modal();
                });
            });
            function submit(){
                // /_commonClearError();
                let formData = new FormData();
                formData.append('idtour',$('#idtour').val())
                formData.append("username", $('#username').val());
                formData.append("tel", $("#tel").val());
                formData.append("email", $("#email").val());
                formData.append("address", $("#address").val());
                formData.append("note", $("#note").val());
                formData.append("adult", $("#adult").val());
                formData.append("child", $("#child").val());
                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    contentType: false,
                    processData: false,
                    url: _routeEdit,
                    data: formData,
                    beforeSend: _showAjaxLoading(),
                    success: function (result) {
                        _hideAjaxLoading();
                        $("#myModal").modal("hide");
                        if (result.status == _statusOK) {
                            $("#successModal").modal();
                            toastr.success(result.message, '', {
                                timeOut: 2000,
                                closeButton: true,
                            });
                        } else {
                            _commonShowError(result.data);
                        }
                    }
                });
            }
        </script>
    @endpush

@endsection
