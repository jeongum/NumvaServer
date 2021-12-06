<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js" ></script>
</head>
<body>
<!-- 아임포트 자바스크립트는 jQuery 기반으로 개발되었습니다 -->
<script type="text/javascript">
$.ajax({
    url: "https://api.iamport.kr/users/getToken", // 예: https://www.myservice.com/certifications
    method: "POST",
    headers: { "Content-Type": "application/json" },
    data: {
        imp_key: "6059102519424712", // REST API키
        imp_secret: "70fc78a79e4f87028a5308795ec4bd104cf04d957e976509b6b754f2d1e20e687dba4227839bed14"
    },
    success: function(data){
        token = data.data.response;
        console.log("토큰발급");
        console.log(data);
    }
});
</script>