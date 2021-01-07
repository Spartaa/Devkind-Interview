@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Activity Log List') }}
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive yajra-datatable">
                            <thead>
                            <tr>
                                <th>Updated By</th>
                                <th>Action</th>
                                <th>Message</th>
                                <th>Old Data</th>
                                <th>Updated Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logDetails as $logDetail)
                                <tr>
                                    <td>{{$logDetail->user->name}}</td>
                                    <td>{{$logDetail->action}}</td>
                                    <td>{{$logDetail->message}}</td>
                                    <td>@foreach(json_decode($logDetail->dirty_data) as $key => $dirty_data)
                                            {{$key .': '.$dirty_data}} <br>
                                        @endforeach

                                    </td>
                                    <td>@foreach(json_decode($logDetail->updated_data) as $key => $updated_data)
                                            {{$key .': '.$updated_data}} <br>
                                        @endforeach

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
@endsection
@push('scripts')
@endpush
