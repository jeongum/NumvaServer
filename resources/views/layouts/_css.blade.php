<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<style>
html{font-size: 16px;}
body{
    font-family: 'Noto Sans KR', sans-serif;
}
@media (min-width: 1600px){
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1600px;
}
}
/* Main CSS */
#main{
    background-image: url('img/main_bg.png');
    position: relative;
    background-size: cover;
    background-repeat: no-repeat;
}
#main-bg{
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: rgba(49,47,53,0.88);
}
#main .container{
    padding-top: 38.88vh;
    padding-bottom:27.777777777777775vh;
    position: relative;
}
#main .intro{
    padding-bottom: 6.48vh;
    text-align: center;
    color: #fff;
    font-size: 3.70vh;
}
#main .intro p.main-numba{
    color: #AB96FF;
    font-size: 7.40vh;
    font-weight: bold;
    margin-bottom: 0;
}
#main .mini-nav a{
    color: #CFCAE3;
    font-size: 2.31vh;
    padding: 0 1.7vh;
}
#howtouse-1 .fp-tableCell{
    vertical-align: bottom;
}
/* How To Use CSS */
#howtouse{
    background-color: #6543EA;  
}
#howtouse nav{
    background: transparent;
    padding: 9.26vh 8.7vh;  
    justify-content: left;
    position: absolute;
}
#howtouse nav a.navbar-brand img{
    width: 9.35vh;
}
#howtouse nav .navbar-logo{
    line-height: 1;
}
#howtouse nav .navbar-logo .kr{
    color: white;
    font-size: 3.24vh;
}
#howtouse nav .navbar-logo .en{
    color: white;
    font-size: 1.85vh;
}
#howtouse .mobile-ui{
    width: 35.74vh;
    height: 100%;
    background-color: white;
    margin-left: auto;
    border-radius: 50px 50px 0 0;
    text-align: center;
}
#howtouse .mobile-ui .mobile-ui-title{
    padding-top: 9.63vh;
}
#howtouse .mobile-ui .mobile-ui-title p:first-child{
    color: #707070;
    font-size: 1.85vh;
}
#howtouse .mobile-ui .mobile-ui-title p:nth-child(2){
    color: #000000;
    font-size: 2.78vh;
}
#howtouse .mobile-ui .mobile-ui-content{
    border-radius: 15px;
    border: 0.5px solid rgba(112,112,112,0.25);
    margin: 2.78vh 3.98vh;
    padding: 2.31vh 2.13vh; 
    color: #262626;
    font-size: 1.29vh;
}
#howtouse .mobile-ui .mobile-ui-content-detail{
    border: 0.5px solid rgba(112,112,112,0.25);
    border-radius: 5px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16);
    margin-top: 1.2vh;
    padding: 1.67vh; 0.83vh;
}
#howtouse .mobile-ui-content-detail .car-register{
    border: 0.5px solid #5B35F5;
    border-radius: 5px;
    margin: 1.67vh 0;
    padding: 1.39vh 0;
}
#howtouse .mobile-ui-content-detail .car-register:nth-child(2){
    padding: 1vh 0;
}
#howtouse .mobile-ui-content-detail .car-register>.svg{
    padding-bottom:0.83vh;
}
#howtouse .mobile-ui-content-detail .car-register p{
    font-size: 1.11vh;
    line-height: 1.3;
}
#howtouse .mobile-ui-content-detail .car-register p>span{
    font-size: 0.65vh;
}
#howtouse .mobile-ui-content-detail .register-btn{
    margin: 0 5.55vh;
    padding: 0.92vh 0;
    background-color: #5B35F5;
    border-radius: 5px;
    color: white;
    font-size: 1.38vh;
}
#howtouse .mobile-ui-footer{
    font-size: 1.39vh;
    margin-bottom: 9.26vh;
}
#howtouse .mobile-ui-footer p>span{
    color:#5B35F5;
}
#howtouse .mobile-ui-des{
    padding-top: 8.33vh;
    font-size: 4.62vh;
    color: white;
    font-weight: 500;
}
#howtouse .mobile-ui-des p>span{
    font-weight: 700;
    font-size: 8.33vh;
}


/* QR service CSS */
#qr_service{
    min-height: 812px;
    background-color: #f5f5f5;
    text-align: center;
    padding: 20px;
}
#qr_service .header{
    font-size: 18px;
    padding: 20px;
}
#qr_service .header img{
    width: 150px;   
}
#qr_service fieldset{
    border: 0.3px solid #707070; 
    border-top-color: #707070; 
    border-radius: 10px; 
    margin: 15px 25px;
    padding: 15px;
    font-size: 18px;
}
#qr_service fieldset legend{
    width: 30%;
    font-size: 16px;
    margin: 0;
    line-height: 1;
}

#qr_service .safety-number-div{
    margin: 15px 25px;
    padding: 15px 0;
}
#qr_service .safety-number-div .safety-number-div-p{
    font-size: 11px;
    padding-bottom: 30px;
    margin: 0;
}
#qr_service .safety-number-div span#safety-number{
    font-size: 23px;
    font-weight: 700;
    color: black;
}
#qr_service .safety-number-div span#countdown{
    font-size: 11px;
    font-weight: 500;
    color: #5B35F5;
}
#qr_service .to-call{
    margin: 5px auto ;
    box-shadow: 0 0 20px rgba(0,0,0,0.16);
    border-radius: 20px;
    width: 100%;
    height: 50px;
    background-color: white;
    border: none;
}
#qr_service .to-call a{
    color: black;
    text-decoration: none;
}
#qr_service .to-call svg{
    vertical-align: middle; 
}      
#qr_service .to-call span{
    font-size: 18px;
    margin-left: 50px;
    vertical-align: middle;
}
#qr_service .to-text{
    margin: 5px auto ;
    box-shadow: 0 0 20px rgba(0,0,0,0.16);
    border-radius: 20px;
    width: 100%;
    height: 50px;
    background-color: white;
    border: none;
}
#qr_service .to-text a{
    color: black;
    text-decoration: none;
}
#qr_service .to-text svg{
    vertical-align: middle; 
}      
#qr_service .to-text span{
    font-size: 18px;
    margin-left: 50px;
    vertical-align: middle;
}
#qr_service .service-des{
    padding: 10px;
    margin: 15px;
    font-size: 13px;
}
#qr_service .service-des span{
    color: #5B35F5;
    font-weight: 500;
}
#qr_service .go-app{
    width: 80%;
    margin:auto;
}
#qr_service .go-app .col-6:first-child{
    text-align: left;
    font-size: 18px;
}
</style>