@extends('layouts.master')

@section('content')

<div id="main">
    <div class="row m-0">
    	<div class = "col-3 col-xl-2">
        	<div class="nav-bar">
                <a class="navbar-brand mr-0" href="/"><img alt="" src="{{asset('img/logo_white.png')}}"></a>
                <div class="nav-item">
                	<a class="nav-link" href = "{{route('help','faq')}}">FAQ</a>
                	<a class="nav-link p-0" href = "{{route('help','help')}}">1:1 문의</a>
                </div>
            </div>
    	</div>
    	<div class="col-6 col-xl-10 p-0">
    	    <div class="container p-0">
        		<div class=" row m-0">
        			<div class="col-lg-12 col-xl-4 p-0 ui">
        				<div class="mobile-ui">
            				<div class="section">
            					<div class="mobile-ui-title">
            						<p class="mb-0">내 맘대로 관리하는</p>
            						<p class="mb-0">QR 전화번호판</p>
            					</div>
            					<div class="mobile-ui-content">
            						<p class="mb-0">내 QR 전화번호판 관리</p>
            						<div class="mobile-ui-elem" id="add-QR">
            							새 QR추가
            						</div>
            						<div class="mobile-ui-elem text-left" id="QR-list-div">
            							<p class="m-0 pt-2">QR 전화번호판 목록</p>  
            							<p class="m-0">등록한 QR 전화번호판 관리</p>
            							<div id="QR-pan">
            							345어 7987
            							</div>
            						</div> 
            					</div>
            					<div class="mobile-ui-footer">
            						<p class="m-0 pb-1">회원가입 후</p>
            						<p class="m-0">자신만의 <span>QR 전화번호판</span>을 등록하세요</p>
            					</div>
            				</div>
            				<div class="section">
            					<div class="mobile-ui-title">
            						<p class="mb-0">편리함과 개인정보 보호를 동시에</p>
            						<p class="mb-0">주차메모 & 안심번호</p>
            					</div>
            					<div class="mobile-ui-content">
            						<p class="mb-0">312155</p>
            						<div class="mobile-ui-elem" >
            							<p>주차메모</p>
            							<p>5분 뒤(20:10) 출차 예정입니다.</p>
            						</div>
            						<div class="mobile-ui-elem m-0">
            							<p class="m-0 pt-2 pb-2">0504-4000-8000</p>
            							<p class="m-0 text-right">21:10 변경예정</p>
            						</div> 
            					</div>
            					<div class="mobile-ui-footer">
            						<p class="m-0 pb-1">메인페이지에서</p>
            						<p class="m-0 pb-1">다른 사람들에게 보여지는 <span>주차메모</span>와</p>
            						<p class="m-0">1시간마다 변경되는 <span>안심번호</span>를 확인하세요</p>
            					</div>
            				</div>
            				<div class="section">
            					<div class="mobile-ui-title">
            						<p class="mb-0">안전하게, 간편하게 연락하는</p>
            						<p class="mb-0">QR 스캔</p>
            					</div>
            					<div class="mobile-ui-content">
            						<p class="mb-0">QR코드 스캔</p>
            						<div class="mobile-ui-elem" >
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16.8vh" height="16.11vh" viewBox="0 0 182.537 174">
                                          <defs>
                                            <filter id="사각형_24857" x="0" y="0" width="174" height="174" filterUnits="userSpaceOnUse">
                                              <feOffset input="SourceAlpha"/>
                                              <feGaussianBlur stdDeviation="5" result="blur"/>
                                              <feFlood flood-opacity="0.161"/>
                                              <feComposite operator="in" in2="blur"/>
                                              <feComposite in="SourceGraphic"/>
                                            </filter>
                                          </defs>
                                          <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#사각형_24857)">
                                            <rect id="사각형_24857-2" data-name="사각형 24857" width="144" height="144" rx="22" transform="translate(15 15)" fill="#fff"/>
                                          </g>
                                          <g id="그룹_18486" data-name="그룹 18486" transform="translate(39.296 39.296)">
                                            <g id="qr-code" transform="translate(0 0)">
                                              <path id="패스_7689" data-name="패스 7689" d="M7.439,7.439H32.693V1.125H1.125V32.693H7.439Z" transform="translate(-1.125 -1.125)" fill="#3b476b"/>
                                              <path id="패스_7690" data-name="패스 7690" d="M24.566,24.566V5.625H5.625V24.566ZM11.939,11.939h6.314v6.314H11.939Z" transform="translate(7.002 7.002)" fill="#3b476b"/>
                                              <path id="패스_7691" data-name="패스 7691" d="M23.063,7.439H49.9V32.693h6.314V1.125H23.063Z" transform="translate(38.496 -1.125)" fill="#3b476b"/>
                                              <path id="패스_7692" data-name="패스 7692" d="M42.566,24.566V5.625H23.625V24.566ZM29.939,11.939h6.314v6.314H29.939Z" transform="translate(39.511 7.002)" fill="#3b476b"/>
                                              <path id="패스_7693" data-name="패스 7693" d="M32.693,48.879H7.439V23.625H1.125V55.193H32.693Z" transform="translate(-1.125 39.511)" fill="#3b476b"/>
                                              <path id="패스_7694" data-name="패스 7694" d="M24.566,23.625H5.625V42.566H24.566ZM18.252,36.252H11.939V29.939h6.314Z" transform="translate(7.002 39.511)" fill="#3b476b"/>
                                              <path id="패스_7695" data-name="패스 7695" d="M49.894,48.879H23.063v6.314H56.211V23.625H49.9V48.879Z" transform="translate(38.496 39.511)" fill="#3b476b"/>
                                              <path id="패스_7696" data-name="패스 7696" d="M19.125,25.439H44.379V38.066h6.314V19.125H19.125Z" transform="translate(31.384 31.384)" fill="#3b476b"/>
                                              <path id="패스_7697" data-name="패스 7697" d="M75.074,50.693V44.379H37.193V19.125H5.625v6.314H30.879V50.693Z" transform="translate(7.002 31.384)" fill="#3b476b"/>
                                              <path id="패스_7698" data-name="패스 7698" d="M14.625,5.625h6.314V24.566H14.625Z" transform="translate(23.256 7.002)" fill="#3b476b"/>
                                              <path id="패스_7699" data-name="패스 7699" d="M5.625,37.193H49.82V5.625H43.506V30.879H5.625Z" transform="translate(7.002 7.002)" fill="#3b476b"/>
                                              <path id="패스_7700" data-name="패스 7700" d="M23.625,14.625H42.566v6.314H23.625Z" transform="translate(39.511 23.256)" fill="#3b476b"/>
                                              <path id="패스_7701" data-name="패스 7701" d="M23.625,23.625h6.314v6.314H23.625Z" transform="translate(39.511 39.511)" fill="#3b476b"/>
                                              <path id="패스_7702" data-name="패스 7702" d="M19.125,23.625h6.314v6.314H19.125Z" transform="translate(31.384 39.511)" fill="#3b476b"/>
                                            </g>
                                          </g>
                                          <path id="fi-rr-angle-right" d="M6.823,19.754a.823.823,0,0,1-.582-1.4l6.726-6.726a2.469,2.469,0,0,0,0-3.491L6.241,1.4A.823.823,0,1,1,7.405.241l6.726,6.726a4.119,4.119,0,0,1,0,5.819L7.4,19.512A.823.823,0,0,1,6.823,19.754Z" transform="translate(167.202 76.771)" fill="#3b476b"/>
                                        </svg>
            						</div>
            						<div class="mobile-ui-elem">
            							<p class="m-0 pt-2">해당 아이콘을 누르면</p>
            							<p class="m-0">QR 스캔을 위한 <span>카메라</span>로 이동합니다</p>
            						</div> 
            					</div>
            					<div class="mobile-ui-footer">
            						<p class="m-0 pb-1"><span>QR코드를 스캔</span>해 차주에게 연락할 수 있어요</p>
            						<p class="m-0"><span>가상번호</span>로 안심하고 연락하세요</p>
            					</div>
            				</div>
        				</div>
        			</div>
        			<div class="col-xl-8 pr-0 des">
        				<div class="mobile-ui-des">
        					<p class="mb-0">
        					내 맘대로 관리하는<br>
        					<span>QR 전화번호판</span>
        					</p>
        				</div>
        				<div class="mobile-ui-des">
        					<p class="mb-0">
        					편리함과 보호를 동시에<br>
        					<span>주차메모 &<br>안심번호</span>
        					</p>
        				</div>
        				<div class="mobile-ui-des">
        					<p class="mb-0">
        					안전하게, 간편하게 연락하는<br>
        					<span>QR 스캔</span>
        					</p>
        				</div>
        			</div>
        		</div>
        	</div>
    	</div>
    	<div class = "col-3 for-grid">
    		<div class="nav-bar">
                <a class="btn rounded-pill bg-light app-download mr-0" href="/">앱 다운로드</a>
                <div class="scroll">
            		<p>Scroll</p>
            	<svg xmlns="http://www.w3.org/2000/svg" width="28.112" height="25" viewBox="0 0 28.112 25" class="to-bottom">
                  <g id="fi-rr-angle-double-right" transform="translate(28.112 -0.828) rotate(90)">
                    <path id="패스_7739" data-name="패스 7739" d="M11.828,28.112a1.012,1.012,0,0,1-.924-.723,1.322,1.322,0,0,1,.217-1.277l8.172-9.572a3.953,3.953,0,0,0,0-4.969L11.121,2a1.317,1.317,0,0,1,0-1.656.9.9,0,0,1,1.414,0l8.172,9.572a6.588,6.588,0,0,1,0,8.281l-8.172,9.572A.932.932,0,0,1,11.828,28.112Z" transform="translate(3.657)" fill="#fff"/>
                    <path id="패스_7740" data-name="패스 7740" d="M1.828,28.112A1.012,1.012,0,0,1,.9,27.389a1.322,1.322,0,0,1,.217-1.277l9.586-11.229a1.318,1.318,0,0,0,0-1.656L1.121,2a1.317,1.317,0,0,1,0-1.656.9.9,0,0,1,1.414,0l9.586,11.229a3.953,3.953,0,0,1,0,4.969L2.535,27.769A.932.932,0,0,1,1.828,28.112Z" transform="translate(0 0)" fill="#fff"/>
                  </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="28.112" height="25" viewBox="0 0 28.112 25" class="to-top" style="display: none">
                  <g id="fi-rr-angle-double-right" transform="translate(0 25) rotate(-90)">
                    <path id="패스_7739" data-name="패스 7739" d="M1,0A1.012,1.012,0,0,0,.076.723,1.322,1.322,0,0,0,.293,2l8.172,9.572a3.953,3.953,0,0,1,0,4.969L.293,26.113a1.317,1.317,0,0,0,0,1.656.9.9,0,0,0,1.414,0L9.879,18.2a6.588,6.588,0,0,0,0-8.281L1.707.343A.932.932,0,0,0,1,0Z" transform="translate(13.657 0)" fill="#fff"/>
                    <path id="패스_7740" data-name="패스 7740" d="M1,0A1.012,1.012,0,0,0,.076.723,1.322,1.322,0,0,0,.293,2L9.879,13.228a1.318,1.318,0,0,1,0,1.656L.293,26.113a1.317,1.317,0,0,0,0,1.656.9.9,0,0,0,1.414,0l9.586-11.229a3.953,3.953,0,0,0,0-4.969L1.707.343A.932.932,0,0,0,1,0Z" transform="translate(0 0)" fill="#fff"/>
                  </g>
                </svg>	
            	</div>
    		</div>
    	</div>
	</div>
	<div class="scroll">
    	<p>Scroll</p>
    	<svg xmlns="http://www.w3.org/2000/svg" width="28.112" height="25" viewBox="0 0 28.112 25" class="to-bottom">
          <g id="fi-rr-angle-double-right" transform="translate(28.112 -0.828) rotate(90)">
            <path id="패스_7739" data-name="패스 7739" d="M11.828,28.112a1.012,1.012,0,0,1-.924-.723,1.322,1.322,0,0,1,.217-1.277l8.172-9.572a3.953,3.953,0,0,0,0-4.969L11.121,2a1.317,1.317,0,0,1,0-1.656.9.9,0,0,1,1.414,0l8.172,9.572a6.588,6.588,0,0,1,0,8.281l-8.172,9.572A.932.932,0,0,1,11.828,28.112Z" transform="translate(3.657)" fill="#fff"/>
            <path id="패스_7740" data-name="패스 7740" d="M1.828,28.112A1.012,1.012,0,0,1,.9,27.389a1.322,1.322,0,0,1,.217-1.277l9.586-11.229a1.318,1.318,0,0,0,0-1.656L1.121,2a1.317,1.317,0,0,1,0-1.656.9.9,0,0,1,1.414,0l9.586,11.229a3.953,3.953,0,0,1,0,4.969L2.535,27.769A.932.932,0,0,1,1.828,28.112Z" transform="translate(0 0)" fill="#fff"/>
          </g>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="28.112" height="25" viewBox="0 0 28.112 25" class="to-top" style="display: none">
          <g id="fi-rr-angle-double-right" transform="translate(0 25) rotate(-90)">
            <path id="패스_7739" data-name="패스 7739" d="M1,0A1.012,1.012,0,0,0,.076.723,1.322,1.322,0,0,0,.293,2l8.172,9.572a3.953,3.953,0,0,1,0,4.969L.293,26.113a1.317,1.317,0,0,0,0,1.656.9.9,0,0,0,1.414,0L9.879,18.2a6.588,6.588,0,0,0,0-8.281L1.707.343A.932.932,0,0,0,1,0Z" transform="translate(13.657 0)" fill="#fff"/>
            <path id="패스_7740" data-name="패스 7740" d="M1,0A1.012,1.012,0,0,0,.076.723,1.322,1.322,0,0,0,.293,2L9.879,13.228a1.318,1.318,0,0,1,0,1.656L.293,26.113a1.317,1.317,0,0,0,0,1.656.9.9,0,0,0,1.414,0l9.586-11.229a3.953,3.953,0,0,0,0-4.969L1.707.343A.932.932,0,0,0,1,0Z" transform="translate(0 0)" fill="#fff"/>
          </g>
        </svg>
    </div>
</div>
<script>

var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();	
   if (st > lastScrollTop){
   		$('.to-bottom').show();
		$('.to-top').hide();
	} 
	else {
     	$('.to-bottom').hide();
		$('.to-top').show();
	}
   	if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
        $('.to-bottom').hide();
    	$('.to-top').show();
    }
   	if($(window).scrollTop() < 100) {
        $('.to-bottom').show();
		$('.to-top').hide();
    }
   lastScrollTop = st;
});

</script>
@endsection
