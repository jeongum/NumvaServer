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
                    <h5 class="font-weight-semi-bold mb-0">SafetyInfo</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive-xl overflow-auto">
                        <table class="table text-center text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                                <th class="font-weight-semi-bold border-top-0 border-right py-2">별명</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">User #</th>
                                <th class="font-weight-semi-bold border-top-0 py-2 border-right">유저</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">QR #</th>
                                <th class="font-weight-semi-bold border-top-0 py-2 border-right">QR일련번호</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">메모 #</th>
                                <th class="font-weight-semi-bold border-top-0 py-2 border-right">메모 내용</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">SN #</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">안심번호</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($safetyInfos as $info)
                            <tr>
                                <td class="py-3">{{$info->id}}</td>
                                <td class="py-3 border-right">{{$info->name}}</td>
                                <td class="py-3">{{$info->user->id}}</td>
                                <td class="py-3 border-right">{{$info->user->name}}</td>
                                <td class="py-3">{{$info->qrcode->id}}</td>
                                <td class="py-3 border-right">{{$info->qrcode->qr_id}}</td>
                                <td class="py-3">@isset($info->memo) {{$info->memo->id}} @endisset</td>
                                <td class="py-3 border-right">@isset($info->memo) {{$info->memo->memo}} @endisset</td>
                                <td class="py-3">{{$info->safety_number->id}}</td>
                                <td class="py-3">{{$info->safety_number->number}}</td>
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
$('#si-dashboard').addClass("active");
$('#qr-dashboard').removeClass("active");
$('#user-dashboard').removeClass("active");
</script>
@endsection