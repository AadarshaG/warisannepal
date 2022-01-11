@extends('layouts.admin')
@section('title','Messages | Admin Dashboard')

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
                    <div class="ibox-title" style="color: #ffffff;"><h1>Message Lists</h1></div>
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
                    @if(isset($messageData))
                        @foreach($messageData as $key=>$messageDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td data-toggle="modal" data-target="#myModal{{$key}}" class="inquery">
                                    {{$messageDetail->name}}
                                </td>
                                <td>{{$messageDetail->email}}</td>
                                <td>
                                    {{$messageDetail->phone}}
                                </td>
                                <td>
                                    {{$messageDetail->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    {{Form::open(['url'=>route('message.destroy',$messageDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this Query?')",'class'=>"form pull-left"])}}
                                    @method('delete')
                                    {{Form::button('<i class="fa fa-trash"></i>',['class'=>'btn btn-danger','style'=>'bmessage-radius: 50%','type'=>'submit'])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                            <div class="modal fade" id="myModal{{$key}}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <h4 class="modal-title">From <strong>{{$messageDetail->name}}</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body" id="pdf">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong style="font-size: 16px;">Send From :</strong> {{$messageDetail->name}}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong style="font-size: 16px;">Contact No. :</strong> {{$messageDetail->phone}}
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong style="font-size: 16px;">Email :</strong> {{$messageDetail->email}}
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong style="font-size: 16px;">Query :</strong> {!! ($messageDetail->message) !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div id="dump"></div>
        </div>
    </div>
@endsection
