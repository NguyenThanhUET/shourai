@extends('layouts.backend')
@section('content')
    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">List destinations ({{$totalDes}} )</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                        <tr class="border-0">
                            <th width="50px" class="border-0">ID</th>
                            <th class="border-0">Image</th>
                            <th class="border-0">Name</th>
                            <th class="border-0">Prefecture</th>
                            <th width="50px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataDes as $des)
                            <tr>
                                <td><a class="btn-link" href="{{route('admin.destination.edit')}}?des={{$des->id}}">#{{$des->id}}</a></td>
                                <td>
                                    <div class="m-r-10"><img src="{{$des->image!=null ?$des->image:asset('img/icon-no-image.svg')}}" alt="user" class="rounded"
                                                             width="45"></div>
                                </td>
                                <td>{{$des->name}}</td>
                                <td>{{$des->prefecture}}</td>
                                <td><span class="btn fa fa-trash"></span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $dataDes->links() }}
            </div>
        </div>
    </div>
@endsection
