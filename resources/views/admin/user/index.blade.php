@extends('admin.layouts.master')
@section('content')
  
<div class="py-4 px-3 px-md-4">

    <div class="mb-3 mb-md-4 d-flex justify-content-between">
        <div class="h3 mb-0">Dashboard</div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-3 mb-md-4">
                <div class="card-header row m-0">
                    <h5 class="font-weight-semi-bold mb-0">Users</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive-xl ">
                        <table class="table text-center text-nowrap mb-0 overflow-auto">
                            <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">이메일</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">이름</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">별명</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">전화번호</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">2차전화번호</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">생년월일</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="py-3">{{$user->id}}</td>
                                <td class="py-3">{{$user->email}}</td>
                                <td class="py-3">{{$user->name}}</td>
                                <td class="py-3">{{$user->nickname}}</td>
                                <td class="py-3">{{$user->phone}}</td>
                                 <td class="py-3">
                                	<button class="btn btn-outline-info btn-sm secondPhone-btn" type="button" data-toggle="modal" data-target="#secondPhone-User" data-phone="{{$user->second_phone}}">
										보기
									</button>
                                </td>
                                <td class="py-3">{{$user->birth}}</td>
                                <td class="py-3">
                                	<button class="btn btn-outline-danger btn-sm delete-btn" type="button" data-toggle="modal" data-target="#delete-User" data-id="{{$user->id}}">삭제하기</button>
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
</div>

<script>
$('#user-dashboard').addClass("active");
$('#qr-dashboard').removeClass("active");
$('#si-dashboard').removeClass("active");

$(".delete-btn").click(function(){
   $('#id').val($(this).data('id'));
});

$(".secondPhone-btn").click(function(){
	var second_phone_data = $(this).data('phone');
	var html = '';
	$.each(second_phone_data, function () {
		html += '<tr>';
		html += '<td>'+this.id+'</td>';
		html += '<td>'+this.second_phone +'</td>';
		html += '<td>'+this.isrep +'</td>';
		html += '<td>'
			+'<a class="btn btn-icon btn-danger btn-sm rounded-circle" href = "secondphone/delete/'+this.id+'"> <i class="gd-trash btn-icon-inner"></i></a>'
           	+ '</td>'
		html += '</tr>'
	});
	$("#second-phone-table").empty();
	$("#second-phone-table").append(html);
});
</script>
@endsection