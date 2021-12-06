@extends('layouts.master') 
@section('content')

<div id="faq">
	<div class="row m-0">
		<div class="col-1 logo">
    		<a class="navbar-brand mr-0" href="/"> 
    			<img src="{{ asset('img/logo.png') }}" alt="">
    		</a>
		</div>
		<div class="col-10 contents">
			<div class="input-icons">
    			<input class="form-control input-field" type="search" placeholder="검색어를 입력하세요." aria-label="Search">
        		<i class="fas fa-search icon"></i>
        	</div>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
                	<a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">FAQ</a>
                </li>
                <li class="nav-item" role="presentation">
                	<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">1:1 문의</a>
                </li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="accordion" id="accordionExample">
						<div class="card">
							@php($count = 0)
							@foreach($faqs as $faq)
							<div class="card-header" id="{{'heading'.$count}}">	
								<h2 class="mb-0">
									<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="{{'#collapse'.$count}}" aria-expanded="true" aria-controls="{{'collapse'.$count}}">
                                  		<i class="fas fa-chevron-right"></i>
										{{$faq->question}}
                                    </button>
                              	</h2>
                            </div>
							<div id="{{'collapse'.$count}}" class="collapse" aria-labelledby="{{'heading'.$count}}" data-parent="#accordionExample">	
								<div class="card-body">
									{{$faq->answer}}
  								</div>
							</div>
							@php($count++)
							@endforeach
						</div>
					</div>
				</div>
				<div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<form id="help" method="post" action="{{route('sendMail')}}">
					@csrf
						<div class="row mx-0">
							<input type="hidden" name="subject" id="subject" value="product"/>
                            <label class="form-label">문의 내용</label>
                        	<button type="button" class="topic-btn active" id="product">제품문의</button>
                        	<button type="button" class="topic-btn" id="delivery">배송문의</button>
                        	<button type="button" class="topic-btn" id="refund">교환 및 환불</button>
                        	<button type="button" class="topic-btn" id="app">어플문의</button>
                        </div>
                        <div class="row mx-0 email">
                        	<input class="form-control input-field" name="emailAddr" placeholder="답변 받을 이메일을 입력하세요.">
                        </div>
                        <div class="row mx-0 content">
                        	<textarea class="form-control input-field" name="content" placeholder="궁금하신 사항을 입력해주세요! 넘바가 친절하게 답변해 드릴게요:)" rows="10"></textarea>
                        </div>
                        <div class="row mx-0 float-right">
                        	<button type="button" class="btn btn-primary submit-btn" data-toggle="modal" data-target="#helpConfirmModal">등록하기</button>
                        </div>
                        <!-- confirm modal -->
                       	<div class="modal fade" id="helpConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
                       		<div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
								<div class="modal-content">
    								<div class="modal-body">
										문의를 등록하겠습니까?
    								</div>
    								<div class="modal-footer">
    									<button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
    									<button type="submit" class="btn btn-primary">확인</button>
    								</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
        <div class="col-1"></div>
	</div>
</div>
<script>
var cat = "{!! $category !!}";
if(cat == 'faq'){
	$('#pills-home-tab').addClass('active');
	$('#pills-home').addClass('active').addClass('show');
}else{
	$('#pills-profile-tab').addClass('active');
	$('#pills-profile').addClass('active').addClass('show');
}
$(".topic-btn").click(function(){
	$('.topic-btn').each(function(){
		$(this).removeClass('active');
	});
	$(this).addClass('active');
	$('#subject').val($(this).attr('id'));
});
</script>
@endsection
