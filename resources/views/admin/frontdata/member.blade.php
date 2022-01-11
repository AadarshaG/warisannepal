@extends('layouts.admin')
@section('title','Member Request | Admin Dashboard')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
@endsection

@section('main-content')
    <a href="http://127.0.0.1:8000/witn/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Request Lists</h1></div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Person Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Received</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($memberData))
                        @foreach($memberData as $key=>$memberDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{!! $memberDetail->name !!}</td>
                                <td>{!! $memberDetail->email !!}</td>
                                <td>{!! $memberDetail->phone !!}</td>
                                <td>{!! $memberDetail->created_at->diffFOrHumans() !!}</td>
                                <td>
                                    <a href="{{route('member.show',$memberDetail->id)}}" class="btn btn-primary show_member" style="border-radius: 50%; margin-left:10px" data-id="{{$memberDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{Form::open(['url'=>route('member.destroy',$memberDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this member?')",'class'=>"form pull-left"])}}
                                    @method('delete')
                                    {{Form::button('<i class="fa fa-trash"></i>',['class'=>'btn btn-danger','style'=>'border-radius: 50%','type'=>'submit'])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
