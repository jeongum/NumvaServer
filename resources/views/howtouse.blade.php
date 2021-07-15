@extends('layouts.master')

@section('content')

<div id="howtouse">
	<nav class="navbar">
        <a class="navbar-brand mr-0" href="/"><img alt="" src="{{asset('img/logo.png')}}"></a>
        <div class="navbar-logo">
        	<p class="kr mb-0">넘바</p>
        	<p class="en mb-0">NUMVA</p>
        </div>
    </nav>
    <div class="container">
		<div id="howtouse-fp">
			<section class="ftco-section section ftco-no-pb" id="howtouse-1">
				<div class="howtouse-scroll-div row">
					<div class="col-6">
						<div class="mobile-ui">
							<div class="mobile-ui-title">
								<p class="mb-0">완벽한 개인정보 보호를 위해</p>
								<p class="mb-0">차량 등록</p>
							</div>
							<div class="mobile-ui-content">
								<p class="mb-0">아직 등록된 차량이 없어요!</p>
								<p class="mb-0">간편하게 차량을 등록하세요</p>
								<div class="mobile-ui-content-detail">
									<div class="car-register mt-0">
										<div class="svg">
    										<svg id="camera" xmlns="http://www.w3.org/2000/svg" width="30.654" height="22.99" viewBox="0 0 30.654 22.99">
                                              <path id="패스_7714" data-name="패스 7714" d="M28.738,23.659v-11.5a1.916,1.916,0,0,0-1.916-1.916H24.577a5.748,5.748,0,0,1-4.062-1.684l-1.59-1.586a1.916,1.916,0,0,0-1.351-.561H13.082a1.916,1.916,0,0,0-1.355.561L10.14,8.563a5.748,5.748,0,0,1-4.063,1.684H3.832a1.916,1.916,0,0,0-1.916,1.916v11.5a1.916,1.916,0,0,0,1.916,1.916h22.99A1.916,1.916,0,0,0,28.738,23.659ZM3.832,8.332A3.832,3.832,0,0,0,0,12.163v11.5A3.832,3.832,0,0,0,3.832,27.49h22.99a3.832,3.832,0,0,0,3.832-3.832v-11.5a3.832,3.832,0,0,0-3.832-3.832H24.577a3.832,3.832,0,0,1-2.709-1.123L20.282,5.622A3.832,3.832,0,0,0,17.572,4.5H13.082a3.832,3.832,0,0,0-2.709,1.123L8.787,7.209A3.832,3.832,0,0,1,6.077,8.332Z" transform="translate(0 -4.5)" fill="#5b35f5" fill-rule="evenodd"/>
                                              <path id="패스_7715" data-name="패스 7715" d="M16.831,22.745a4.79,4.79,0,1,0-4.79-4.79A4.79,4.79,0,0,0,16.831,22.745Zm0,1.916a6.706,6.706,0,1,0-6.706-6.706,6.706,6.706,0,0,0,6.706,6.706Z" transform="translate(-1.504 -5.502)" fill="#5b35f5" fill-rule="evenodd"/>
                                              <path id="패스_7716" data-name="패스 7716" d="M6.416,14.458a.958.958,0,1,1-.958-.958A.958.958,0,0,1,6.416,14.458Z" transform="translate(-0.668 -5.837)" fill="#5b35f5"/>
                                            </svg>
                                        </div>
										<p class="mb-0">차량 사진 등록<br>
											<span>※ 사진에는 차량 번호판이 포함되어야 합니다</span>
										</p>
									</div>
									<div class="car-register">
										<p class="mb-0">
											차량 번호를 입력해주세요.
										</p>
									</div>
									<div class="register-btn">
										<p class="mb-0">
											등록하기
										</p>
									</div>
								</div>
							</div>
							<div class="mobile-ui-footer">
								<p class="mb-0">
    								회원가입 후<br>
    								자신의 <span>차량 번호판 사진</span>과<br>
    								<span>차량 번호</span>를 등록하세요.
								</p>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="mobile-ui-des">
							<p class="mb-0">
							완벽한 개인정보 보호를 위한<br>
							<span>차량등록</span>
							</p>
						</div>
					</div>
				</div>
				
			</section>
			<section class="ftco-section section ftco-no-pb" id="howtouse-2">
				<p>내맘대로 관리하는 </p>
				<p>QR번호판</p>
			</section>
			<section class="ftco-section section ftco-no-pb" id="howtouse-3">
				<p>안전하게 간편하게 연결하는</p>
				<p>QR스캔</p>
			</section>
		</div>
	</div>
</div>

@endsection
