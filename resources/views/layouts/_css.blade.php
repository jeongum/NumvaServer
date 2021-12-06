<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
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


/* ------ Main CSS ------ */
#main{
    background-color: #3B476B;  
}

#main .nav-bar{
    background: transparent;
    text-align: center;
    position: sticky;
    top:0;
    height: fit-content;
}
#main .nav-bar a.navbar-brand img{
    width: 6.8vh;
}
#main .nav-item{
    padding-top: 70vh;
    display: block;
    text-align: center;
}
#main .nav-link{
    color: white;
    font-weight: 500;
    font-size: 2.13vh;
}

#main .mobile-ui{
    width: 35.74vh;
    padding: 9.63vh 0;
    background-color: white;
    border-radius: 4.6vh;
    text-align: center;
}
#main .mobile-ui .mobile-ui-title{
    font-weight: 700;
}
#main .mobile-ui .mobile-ui-title p:first-child{
    color: #707070;
    font-size: 1.85vh;
}
#main .mobile-ui .mobile-ui-title p:nth-child(2){
    color: #000000;
    font-size: 2.78vh;
}
#main .mobile-ui .mobile-ui-content{
    border-radius: 15px;
    border: 2px solid #f4f4f4;
    margin: 2.78vh 3.98vh;
    padding: 2.31vh 2.13vh; 
    color: #000000;
    font-size: 1.29vh;
}
#main .mobile-ui-content #add-QR{
    border-radius: 30px;
    background-color: #3B476B;
    color: white;
    width: fit-content;
    padding: 1vh 3.7vh;
    margin: 2.78vh auto;
}
#main #QR-list-div{
    padding: 0 1vh;
}

#main #QR-list-div p:first-child{
    color: #3B476B;
    font-size: 1.11vh;
    padding-bottom: 0.5vh;
   
}
#main #QR-list-div p:nth-child(2){
    color: #BCBCBC;
    font-size: 1vh;
    font-weight: 300;
}

#main #QR-list-div p:nth-child(2){
    color: #BCBCBC;
    font-size: 1vh;
    font-weight: 300;
}

#main #QR-list-div #QR-pan{
    background-color: #F0F0F0;
    border-radius: 10px;
    font-size: 1.3vh;
    font-weight: 300;
    padding: 1vh;
    text-align: center;
    margin-top: 1.85vh;
    margin-bottom: 7.4vh;
}

#main .mobile-ui-footer{
    font-size: 1.39vh;
    font-weight: 300;
}
#main .mobile-ui-footer p>span{
    color:#3B476B;
    font-weight: 500;
}
#main .mobile-ui-des{
    padding-top: 36.1vh;
    font-size: 4.62vh;
    color: white;
    font-weight: 500;
}
#main .mobile-ui-des p>span{
    font-weight: 700;
    font-size: 8.33vh;
    line-height: 1.3;
}

#main .mobile-ui .section:nth-child(2){
    padding-top: 39.25vh;
}

#main .mobile-ui .section:nth-child(2) .mobile-ui-content{
    background-color: #3B476B; 
    color: #ffffff;
    font-size: 2.1vh;
}

#main .mobile-ui .section:nth-child(2) .mobile-ui-elem{
    background-color: #ffffff; 
    color: #3B476B;
    border-radius: 10px;
    padding: 1vh;
    margin: 1.85vh 0;
    font-size: 1.85vh;
}

#main .mobile-ui .section:nth-child(2) .mobile-ui-elem p:not(:first-child){
    font-size: 1.39vh;
    padding: 2.4vh 0;
    margin-bottom: 2.77vh; 
}

#main .mobile-ui .section:nth-child(2) .mobile-ui-elem:nth-child(3) p{
    font-size: 2.13vh;
}

#main .mobile-ui .section:nth-child(2) .mobile-ui-elem:nth-child(3) p:not(:first-child){
    font-size: 1.3vh;
    padding: 0;
}

#main .mobile-ui-des:nth-child(2){
    padding-top: 74vh;
}

#main .mobile-ui .section:nth-child(3){
    padding-top: 26.85vh;
}

#main .mobile-ui .section:nth-child(3) .mobile-ui-content{
    padding: 4.62vh 2.13vh;
    font-size: 1.48vh;
}

#main .mobile-ui .section:nth-child(3) .mobile-ui-elem:nth-child(2){
    padding-top: 3.7vh;
}   
#main .mobile-ui .section:nth-child(3) .mobile-ui-elem:nth-child(3){
    color: #A0A0A0;
    font-size: 0.9vh;
}
#main .mobile-ui .section:nth-child(3) .mobile-ui-elem:nth-child(3){
    color: #A0A0A0;
    font-size: 0.9vh;
}

#main .mobile-ui .section:nth-child(3) .mobile-ui-elem:nth-child(3) span{
    color: #3B476B;
}
#main .mobile-ui .section:nth-child(3) .mobile-ui-footer{
    padding-bottom:4.62vh;
}
#main .mobile-ui-des:nth-child(3){
    padding-top: 55vh;
}

.scroll{
    position: sticky;
    background-color: transparent;
    bottom: 1.5rem;
    text-align: center;
    color: white;
    width:fit-content;
    margin:auto;
}

.for-grid .scroll{
    padding-top: 75vh;
}
@media (min-width: 1200px){
    .mobile-ui{
        margin: 27.78vh 0;
        margin-left:auto;
    }
    
    .mobile-ui-des{
        display: block;
    }
    .for-grid{
        display: none;
    }
    .des{
        display: block;
        padding-left: 18vh;
    }
    #main .nav-bar {
        padding: 9.26vh;
    }
    #footer div.info{
        padding-left: 33.4vh; 
    }
    .scroll{
        display: block;
    }
    .for-grid .scroll{
        display: none;;
    }
}

@media (max-width: 1199.98px) {
    .mobile-ui{
        margin: 27.78vh auto;
    }
    .mobile-ui-des{
        display:none;
    }
    .for-grid{
        display: block;
    } 
    .des{
        display: none;
    }
    #main .container .ui,
    #main .container .des{
        padding: 0 ;
    }
    #main .nav-bar {
        padding: 9.26vh 0;
    }
    #footer div.info{
        padding-left: 12vh; 
    }
    .scroll{
        display: none;
    }
    .for-grid .scroll{
        display: block;
    }
}



/* ------ FAQ CSS ------ */
#faq {
    font-size: 2.3vh;
}
#faq .navbar {
    background: transparent;
    padding: 9.26vh 10vh;
}
#faq .nav-link{
    padding: 0;
}
#faq .nav-tabs{
    border-bottom: none;
    font-size: 5.55vh;
    font-weight: 400;
    padding-top: 6.4vh;
}
#faq .nav-tabs .nav-link{
    color: #C3C3C3;
    border: none;
    border-bottom: 3px solid #C3C3C3;
    padding-right: 7.4vh;
}
#faq .nav-tabs .nav-link.active{
    color: #3B476B;
    border-bottom: 3px solid #3B476B;
}
#faq .tab-content{
    padding-top: 4.62vh;
    padding-bottom: 53.7vh;
}
#faq .row>div{
    padding-top:9.26vh;
}
#faq .row .logo{
    text-align: right;
}
#faq a.navbar-brand img{
    width: 6.8vh;
}
#faq .input-icons {
    margin: 1rem 0px;
    position: relative;
}
#faq .icon {
    position: absolute;
    padding: 10px;
    min-width: 40px;
    top:15%;
    right:0;
    color: #3B476B;
}
#faq .input-field {
    height: 4.6vh;
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 6px rgb(0 0 0 / 10%);
    border: none;
}
#faq .input-field::placeholder{
    color: #B9B9B9;
}
#faq .card{
    border: none;
}
#faq .card-header{
    background: transparent;
    border:none;
    padding: 0;
}
#faq .card-header button{
    color: #3B476B;
    text-decoration: none;
    padding: 0;
    padding-bottom: 1.5vh;
    font-size: 2.3vh;
}
#faq .card-header button:focus{
    box-shadow: none;
    outline: 0;
}
#faq label.form-label{
    color:#3B476B;
}
#faq button.topic-btn{
    width: 13vh;
    background: transparent;
    border: 1px solid #E2E7ED;
    border-radius: 5px;
    color: #E2E7ED;
    margin-left: 1.85vh;
    padding: 0;
}
#faq button.topic-btn.active{
    border: 1px solid #6B7E95;
    color: #6B7E95;
}
#faq #help .row:not(:first-child){
    margin-top: 2.5vh;
}
#faq #help .email .input-field{
    width: 50%;
}
#faq #help .content .input-field{
    height: fit-content;
}      
#faq #help .submit-btn{
    background-color: #3B476B;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 0.5vh 1.39vh;
}
#faq #helpConfirmModal .modal-content{
    width: 70%;
    border: none;
    
}
#faq #helpConfirmModal .modal-body{
    padding: 5.56vh 0;
    text-align: center;
}
#faq #helpConfirmModal .modal-footer{
    padding: 0;
}
#faq #helpConfirmModal .modal-footer button{
    width: 50%;
    margin:0;
    border-radius:0;
    background-color: #3B476B;
    border:none;
} 
#faq #helpConfirmModal .modal-footer button:first-child{
    background-color: #99989C;
    color: black;
} 

/* ------ QR Service CSS ------ */
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


/* ------ Footer CSS ------ */
#footer div.about-us{
    padding-left: 33.4vh;
    font-size: 3.7vh;
    font-weight: bold;
}
#footer div.info{
    margin-top: -1.4vh;
    padding-top: 5vh;
    padding-bottom: 3.7vh;
}
#footer div.info span{
    padding-right:3.7vh;
    font-size: 1.85vh;
} 
#footer .anchor{
    padding-top:5.56vh;
} 
#footer .anchor a{
    padding-right:3.7vh;
    font-size: 1.85vh;
    font-weight: bold;
}
#main~#footer{
    background: #3B476B;    
}
#main~#footer div.about-us{
    color: white;
}
#main~#footer div.info{
    background: white;
}
#main~#footer div.info span{
    color: #3B476B;
} 
#main~#footer .anchor a{
    color: #404040;
}

#faq~#footer{
    background: #ffffff;    
}
#faq~#footer div.about-us{
    color: #3B476B;
}
#faq~#footer div.info{
    background: #3B476B;
}
#faq~#footer div.info span{
    color: #ffffff;
} 
#faq~#footer .anchor a{
    color: #ffffff;
} 
</style>