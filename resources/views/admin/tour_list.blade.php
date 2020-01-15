@extends('layouts.backend')
@section('content')
    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
        <button class="btn btn-link"><a class="btn-link" href="{{route('admin.destination.add')}}"><span class="fa fa-plus"></span></a></button>
    </div>
    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">List tours ({{$totalTour}} )</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                        <tr class="border-0">
                            <th width="50px" class="border-0">ID</th>
                            <th class="border-0">Image</th>
                            <th class="border-0">Name</th>
                            <th class="border-0">Start</th>
                            <th class="border-0">Destination Prefecture</th>
                            <th width="50px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataTour as $tour)
                            <tr>
                                <td><a class="btn-link" href="{{route('admin.tours.edit')}}?tour={{$tour->id}}">#{{$tour->id}}</a></td>
                                <td>
                                    <div class="m-r-10"><img src="{{$tour->image!=null ?$tour->image:asset('img/icon-no-image.svg')}}" alt="user" class="rounded"
                                                             width="45"></div>
                                </td>
                                <td>{{$tour->name}}</td>
                                <td>{{$tour->location_start}}</td>
                                <td>{{$tour->location_end}}</td>
                                <td><span class="btn fa fa-trash"></span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $dataTour->links() }}
            </div>
        </div>
    </div>
@endsection
