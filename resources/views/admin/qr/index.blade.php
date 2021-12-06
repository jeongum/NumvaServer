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
                    <h5 class="font-weight-semi-bold mb-0">QR Info</h5>
                    <a class="btn btn-primary ml-auto" href = "admin/qr/generate">QR생성하기</a>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive-xl">
                        <table class="table text-center text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">일련번호</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">이미지 URL</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">할당여부</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">SI #</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">할당유저</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($qrs as $qr)
                            <tr>
                                <td class="py-3">{{$qr->id}}</td>
                                <td class="py-3">{{$qr->qr_id}}</td>
                                <td class="py-3">{{$qr->url}}</td>
                                @if($qr->is_allot == 'Y')
                                <td class="py-3">
                                	<span class="badge badge-pill badge-success">Yes</span>
                                </td>
                                <td class="py-3">
                                	<span class="py-3">{{$qr->safety_info->id}}</span>
                                </td>
                                 <td class="py-3">
                                	<span class="py-3">{{$qr->safety_info->user->name}}</span>
                                </td>
                                <td class="py-3">
                            		<button class="btn btn-outline-danger btn-sm unconnect-btn" type="button" data-toggle="modal" data-target="#unconnect-QR" data-id="{{$qr->id}}">할당취소</button>
                                </td>
                                @else
								<td class="py-3">
                        			<span class="badge badge-pill badge-warning">No</span>
                                </td>
                                <td class="py-3">
                                	<span class="py-3"></span>
                                </td>
                                <td class="py-3">
                                	<span class="py-3"></span>
                                </td>
                                <td class="py-3">
                                	<button class="btn btn-outline-primary btn-sm connect-btn" type="button" data-toggle="modal" data-target="#connect-QR" data-id="{{$qr->id}}">할당하기</button>
                                </td>
                                @endif
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
$('#qr-dashboard').addClass("active");
$('#si-dashboard').removeClass("active");
$('#user-dashboard').removeClass("active");

$(".connect-btn").click(function(){
   $('#con_qr_id').val($(this).data('id'));
});
$(".unconnect-btn").click(function(){
   $('#uncon_qr_id').val($(this).data('id'));
});
</script>

@endsection