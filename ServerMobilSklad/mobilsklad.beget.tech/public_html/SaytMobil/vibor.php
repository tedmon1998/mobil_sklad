<?php 
 require_once "session.php";
 ?>
<html>
<head>
    <title></title>
  <style>
  
  @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,700,400italic,300italic,700italic&subset=latin,cyrillic");
@import url(https://fonts.googleapis.com/css?family=Russo+One&subset=latin,cyrillic);
body {
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
  font-weight: 400;
}
ul {
  list-style-type: none;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  margin: 0;
}
input,
textarea {
  border: 0;
  outline: none;
}
textarea {
  resize: none;
}
.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 100px;
  background: #2b374d;
  z-index: 999;
}
@media screen and (max-width: 992px) {
  .header {
    -webkit-transform: translateX(-100%);
        -ms-transform: translateX(-100%);
            transform: translateX(-100%);
    visibility: hidden;
    opacity: 0;
    min-height: 100vh;
    width: 250px;
    -webkit-transition: all 0.5s;
            transition: all 0.5s;
    overflow: hidden;
  }
}
.header__active {
  -webkit-transform: translateX(0);
      -ms-transform: translateX(0);
          transform: translateX(0);
  opacity: 1;
  visibility: visible;
}
.header__container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  height: 100px;
}
@media screen and (max-width: 992px) {
  .header__container {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column;
    padding: 25px 0;
    height: 100vh;
    width: 235px;
  }
}
.header__logo {
  position: relative;
  display: block;
  margin-right: 75px;
  height: 65px;
  width: 49px;
}
.header__logo img {
  max-width: 100%;
  height: auto;
}
@media screen and (max-width: 1199px) {
  .header__logo {
    margin-right: 50px;
  }
}
@media screen and (max-width: 992px) {
  .header__logo {
    margin-right: 0;
    margin-bottom: 50px;
  }
}
.mob-icon {
  position: absolute;
  display: none;
  left: 20px;
  top: 20px;
  width: 40px;
  height: 27px;
  -webkit-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
          transform: rotate(0deg);
  -webkit-transition: 0.5s ease-in-out;
          transition: 0.5s ease-in-out;
  cursor: pointer;
}
@media screen and (max-width: 992px) {
  .mob-icon {
    display: block;
    z-index: 2;
  }
}
.mob-icon__item {
  display: block;
  height: 5px;
  width: 100%;
  background: #2b374d;
  border-radius: 9px;
  opacity: 1;
  margin-bottom: 5px;
}
.mob-icon__item:last-child {
  margin-bottom: 0;
}
.menu {
  position: relative;
  font-size: 0;
}
.menu__item {
  font-family: 'Russo One', sans-serif;
  position: relative;
  display: inline-block;
  vertical-align: middle;
  font-size: 22px;
  color: #fff;
  margin-right: 30px;
  text-shadow: 2px 2px 5px #000;
  -webkit-transition: all 0.25s;
          transition: all 0.25s;
}
@media screen and (max-width: 1199px) {
  .menu__item {
    font-size: 18px;
    margin-right: 20px;
  }
}
@media screen and (max-width: 992px) {
  .menu__item {
    margin-right: 0;
    margin-bottom: 20px;
  }
}
.menu__item_active {
  color: #637494;
}
.menu__item:hover {
  color: #637494;
}
.menu__item:last-child {
  margin-right: 0;
}
.section {
  position: relative;
  min-height: 700px;
  padding: 50px 0;
}
@media screen and (max-width: 992px) {
  .section {
    padding: 35px 0;
  }
}
.section__sec1 {
  position: relative;
  padding-top: 100px;
  width: 100%;
  overflow: hidden;
  background-image: url("http://mobilsklad.beget.tech/SaytMobil/images/fona.jpg");
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
  z-index: 1;
}
.section__sec1:after {
  content: '';
  width: 100%;
  position: absolute;
  bottom: 0;
  left: 0;
  height: 100px;
  background: -webkit-linear-gradient(bottom, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
  background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
}
.section__sec2 {
  background-color: #f2f7f8;
}
.section__sec2:after {
  content: '';
  width: 100%;
  position: absolute;
  left: 0;
  top: 0;
  height: 3px;
  background: -webkit-linear-gradient(top, rgba(0,0,0,0.9) 0%, #f2f7f8 100%);
  background: linear-gradient(to bottom, rgba(0,0,0,0.9) 0%, #f2f7f8 100%);
}
.section__sec3 {
  background-color: #2a4365;
}
.section__sec4 {
  background-image: url("http://mobilsklad.beget.tech/SaytMobil/images/fona.jpg");
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
  width: 100%;
}
.section__sec5 {
  background-color: #2a4365;
  min-height: 400px;
}
.section__sec6 {
  background-color: #070d17;
  min-height: 200px;
}
.abs-container {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  z-index: 2;
  text-align: center;
}
.slogan {
  position: relative;
}
.slogan__divider {
  position: relative;
  width: 400px;
  height: 20px;
  margin: 0 auto;
  background: url("../img/divider_white.png") no-repeat center center;
  background-size: cover;
}
@media screen and (max-width: 992px) {
  .slogan__divider {
    width: 400px;
    height: 25px;
  }
}
.slogan__top-text {
  font-size: 75px;
  color: #fff;
  font-weight: bold;
  text-shadow: #2b374f 1px 0px, #2b374d 1px 1px, #2b374d 0px 1px, #2b374d -1px 1px, #2b374d -1px 0px, #2b374d -1px -1px, #2b374d 0px -1px, #2b374d 1px -1px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px;
}
@media screen and (max-width: 992px) {
  .slogan__top-text {
    font-size: 36px;
  }
}
.slogan__bot-text {
  font-size: 55px;
  color: #fff;
  font-weight: bold;
  text-shadow: #2b374f 1px 0px, #2b374d 1px 1px, #2b374d 0px 1px, #2b374d -1px 1px, #2b374d -1px 0px, #2b374d -1px -1px, #2b374d 0px -1px, #2b374d 1px -1px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px;
}
@media screen and (max-width: 992px) {
  .slogan__bot-text {
    font-size: 30px;
  }
}
.main-logo {
  display: block;
  margin-bottom: 20px;
  box-shadow: 0 0 1px rgba(0,0,0,0);
  width: 117px;
  height: 156px;
  margin: 0 auto;
}
@media screen and (max-width: 767px) {
  .main-logo {
    width: 80px;
    height: 105px;
  }
}
.main-logo img {
  max-width: 100%;
  height: auto;
}
.title-line {
  position: relative;
  font-size: 40px;
  font-weight: bold;
  color: #000;
  text-align: center;
  margin-bottom: 40px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: space;
  -webkit-justify-content: space;
      -ms-flex-pack: space;
          justify-content: space;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
}
@media screen and (max-width: 1199px) {
  .title-line {
    font-size: 28px;
  }
}
@media screen and (max-width: 767px) {
  .title-line {
    font-size: 20px;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
        -ms-flex-pack: center;
            justify-content: center;
  }
}
.title-line_color_white {
  color: #fff;
}
.title-line_color_white .title-line__line {
  background-color: #fff;
  box-shadow: 2px 2px 5px #000;
}
.title-line_color_white .title-line__text {
  text-shadow: #2b374d 1px 0px, #2b374d 1px 1px, #2b374d 0px 1px, #2b374d -1px 1px, #2b374d -1px 0px, #2b374d -1px -1px, #2b374d 0px -1px, #2b374d 1px -1px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px;
  color: #fff;
}
.title-line__text {
  font-family: 'Russo One', sans-serif;
  position: relative;
  z-index: 2;
  padding: 0 40px;
  white-space: nowrap;
  text-transform: uppercase;
  text-shadow: 0.5px 0.9px 1px rgba(0,1,2,0.33);
}
@media screen and (max-width: 767px) {
  .title-line__text {
    white-space: normal;
    padding: 0;
  }
}
.title-line__line {
  height: 1px;
  background-color: #000;
  width: 100%;
}
@media screen and (max-width: 767px) {
  .title-line__line {
    display: none;
  }
}
.text {
  margin: 14px;
  font-size: 20px;
  line-height: 38px;

}
@media screen and (max-width: 992px) {
  .text {
    font-size: 16px;
  }
}
.text_paragraph {
  text-indent: 40px;
}

.text1 {
  margin: 0;
  font-size: 16px;
  line-height: 24px;
  text-align: justify;
}
@media screen and (max-width: 992px) {
  .text1 {
    font-size: 16px;
  }
}
.text_paragraph1 {
  text-indent: 40px;
}

.info {
  position: relative;
}
.info_pos_left {
  text-align: left;
}
.info_pos_right {
  text-align: right;
}
@media screen and (max-width: 1199px) {
  .info {
    margin-bottom: 40px;
  }
}
.info_pos_left .info__text {
  margin-left: 40px;
  float: left;
}
@media screen and (max-width: 1199px) {
  .info_pos_left .info__text {
    float: none;
    margin-left: 0;
    text-align: center;
    padding-top: 0;
  }
}
.info_pos_left .info__icon {
  float: left;
}
@media screen and (max-width: 1199px) {
  .info_pos_left .info__icon {
    float: none;
    margin: 0 auto 20px;
  }
}
.info_pos_right .info__text {
  margin-right: 40px;
  float: right;
}
@media screen and (max-width: 1199px) {
  .info_pos_right .info__text {
    float: none;
    margin-right: 0;
    text-align: center;
    padding-top: 0;
  }
}
.info_pos_right .info__icon {
  float: right;
}
@media screen and (max-width: 1199px) {
  .info_pos_right .info__icon {
    float: none;
    margin: 0 auto 20px;
  }
}
.info__wrap {
  position: relative;
  zoom: 1;
}
.info__wrap:after,
.info__wrap:before {
  content: "";
  display: table;
}
.info__wrap:after {
  clear: both;
}
.info__text {
  position: relative;
  padding-top: 40px;
  font-size: 20px;
  color: #fff;
  font-weight: bold;
}
@media all and (max-width: 992px) {
  .info__text {
    font-size: 16px;
  }
}
.info__icon {
  position: relative;
  height: 170px;
  width: 170px;
}
.info__icon img {
  max-width: 100%;
  height: auto;
}
.info__line-arrow {
  position: relative;
  margin-top: 65px;
  width: 750px;
  height: 55px;
}
.info__line-arrow img {
  max-width: 100%;
  height: auto;
}
@media screen and (max-width: 1199px) {
  .info__line-arrow {
    display: none;
  }
}
.form {
  position: relative;
}
.form__group {
  position: relative;
  margin-bottom: 30px;
  zoom: 1;
}
.form__group:after,
.form__group:before {
  content: "";
  display: table;
}
.form__group:after {
  clear: both;
}
.form__label {
  position: relative;
  font-size: 20px;
  line-height: 40px;
  font-weight: bold;
  text-shadow: #2b374d 1px 0px, #2b374d 1px 1px, #2b374d 0px 1px, #2b374d -1px 1px, #2b374d -1px 0px, #2b374d -1px -1px, #2b374d 0px -1px, #2b374d 1px -1px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px, #2b374d 0 0 3px;
  color: #fff;
  display: block;
  vertical-align: middle;
}
.form__input {
  position: relative;
  width: 100%;
  border: 0px solid #000;
  border-radius: 20px;
  font-size: 16px;
  font-weight: bold;
  height: 55px;
  padding: 0 20px;
}
.form__textarea {
  position: relative;
  width: 100%;
  height: 90px;
  font-size: 16px;
  font-weight: bold;
  border: 0px solid #000;
  padding: 20px;
  border-radius: 20px;
}
.form__btn-send {
  position: relative;
  border: 0px solid #000;
  border-radius: 10px;
  height: 55px;
  width: 200px;
  left: 50%;
  margin-left: -100px;
  font-size: 20px;
  line-height: 40px;
  text-align: centeer;
  padding: 0 25px;
  background: #fff;
  color: #000;
  -webkit-transition: all 0.25s;
          transition: all 0.25s;
}
.form__btn-send:hover {
  background: #2b374d;
  color: #fff;
}
.info-circles {
  position: relative;
}
.info-circles__item {
  position: relative;
  text-align: center;
  cursor: pointer;
}
@media screen and (max-width: 1199px) {
  .info-circles__item {
    margin-bottom: 40px;
  }
}
.info-circles__item:hover .info-circles__circle {
  background-color: #2098d1;
  border-color: #164568;
}
.info-circles__circle {
  position: relative;
  width: 165px;
  height: 165px;
  margin: 0 auto;
  line-height: 145px;
  border-radius: 50%;
  background-color: #164568;
  border: 10px solid #2098d1;
  margin-bottom: 20px;
  box-shadow: 0 0 1px rgba(0,0,0,0);
  overflow: hidden;
  -webkit-transition: all 0.3s ease-out;
          transition: all 0.3s ease-out;
}
.info-circles__text {
  position: relative;
  font-weight: bold;
  color: #fff;
  font-size: 18px;
}
.social-icons {
  position: relative;
}
.social-icons__item {
  position: relative;
  display: block;
  width: 85px;
  height: 85px;
  margin: 0 auto;
}
@media screen and (max-width: 767px) {
  .social-icons__item {
    width: 50px;
    height: 50px;
  }
}
.social-icons__item img {
  max-width: 100%;
  height: auto;
}
/*# sourceMappingURL=styl/style.css.map */
/*# sourceMappingURL=style.css.map */
  .vixod{text-decoration:none; text-align:center; 
 padding:11px 23px; 
 border:solid 1px #004F72; 
 -webkit-border-radius:21px;
 -moz-border-radius:21px; 
 border-radius: 21px; 
 font:27px Arial, Helvetica, sans-serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#ffffff; 
 background-image: -moz-linear-gradient(top, #ffffff 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #ffffff 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #ffffff 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #ffffff 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #ffffff 0% ,#000000 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
 opacity:0.72; 
 -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=72); 
 filter: alpha(opacity=72); 
      position: absolute; /* Абсолютное позиционирование */
    left: 1%; /* Положение слоя от левого края */
    top: 90%; /* Положение слоя от верхнего края */
      
  }.vixod:hover{
 padding:11px 23px; 
 border:solid 1px #004F72; 
 -webkit-border-radius:21px;
 -moz-border-radius:21px; 
 border-radius: 21px; 
 font:27px Arial, Helvetica, sans-serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#ffffff; 
 background-image: -moz-linear-gradient(top, #ffffff 0%, #944949 100%); 
 background-image: -webkit-linear-gradient(top, #ffffff 0%, #944949 100%); 
 background-image: -o-linear-gradient(top, #ffffff 0%, #944949 100%); 
 background-image: -ms-linear-gradient(top, #ffffff 0% ,#944949 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#944949', endColorstr='#944949',GradientType=0 ); 
 background-image: linear-gradient(top, #ffffff 0% ,#944949 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
  
  
      position: absolute; /* Абсолютное позиционирование */
    left: 1%; /* Положение слоя от левого края */
    top: 90%; /* Положение слоя от верхнего края */
 }
  
body { margin: 0; /* Убираем отступы */
    	height: 100%; /* Высота страницы */
	background: url('./images/fona.jpg')center no-repeat fixed;width: 100%;
	background-size: cover;}
	
   .button{
       opacity:0.5;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#0055ff; 
 background-image: -moz-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #0055ff 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #0055ff 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
  
  }
button:focus {
    outline: none;
}

button:hover {
       opacity:1;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#0055ff; 
 background-image: -moz-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #0055ff 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #0055ff 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #0055ff 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
  
}
button:active {
       opacity:1;
 text-decoration:none; 
 text-align:center; 
 padding:15px 70px; 
 border:solid 2px #004F72; 
 -webkit-border-radius:40px;
 -moz-border-radius:40px; 
 border-radius: 40px; 
 font:18px "Times New Roman", Times, serif; 
 font-weight:bold; 
 color:#ffffff; 
 background-color:#ff0000; 
 background-image: -moz-linear-gradient(top, #ff0000 0%, #000000 100%); 
 background-image: -webkit-linear-gradient(top, #ff0000 0%, #000000 100%); 
 background-image: -o-linear-gradient(top, #ff0000 0%, #000000 100%); 
 background-image: -ms-linear-gradient(top, #ff0000 0% ,#000000 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000',GradientType=0 ); 
 background-image: linear-gradient(top, #ff0000 0% ,#000000 100%);   
 -webkit-box-shadow:inset 0px 0px 1px #ffffff;  -moz-box-shadow:inset 0px 0px 1px #ffffff;  box-shadow:inset 0px 0px 1px #ffffff;  
  
}
  
   #centerLayer {
    position: absolute; /* Абсолютное позиционирование */
    left: 50%; /* Положение слоя от левого края */
    top: 50%; /* Положение слоя от верхнего края */
    margin-left: -150px; /* Отступ слева */
    margin-top: -100px; /* Отступ сверху */
   }
  </style>
  
      <link rel="shortcut icon" href="./587a324d7b94d1599d547ec2.png">
    <meta name="Robots" content="all">
    <meta name="resourse-type" content="document">
    <meta name="document-state" content="dynamic">
    <meta name="revisit-after" content="1 days">
    <meta name="document-state" content="dynamic">
    <meta name="distribution" content="global">
  
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap-grid-3.3.1.min.css" rel="stylesheet" type="text/css">
    <link href="./default.css" rel="stylesheet" type="text/css">
    <link href="./SaytMobil/stylenf.css" rel="stylesheet" type="text/css">
    <link href="./default.date.css" rel="stylesheet" type="text/css">
    <link href="./bootstrap-grid-3.3.2.min.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
</head>
<body>

    <!-- //NavigationBar-->
    <!-- Background_cyber-->
    <section id="top" class="section section__sec1" style="height: 100%">
      <canvas id="canvas-animation" width="100%" height="100%"></canvas>
      <div class="container abs-container">
        <div class="row">
         <div id="centerLayer">
<form method="POST">

    <button class="button" onclick="location.href='./sklad.php'" type="button" style="width: 100%;">Склад</button><br><br>
    <button class="button" onclick="location.href='../avtorizaciya/registr.php'" type="button" style="width: 100%;">Сбросить пароль</button><br><br>
    <button class="button" onclick="location.href='./get_all_products.php'" type="button" style="width: 100%;">Изменить</button><br><br>
    <a href="./logout.php?do=logout" name="ok" class="vixod" style="left: -165%; top: 185%"><big>Выход</big></a>

</form>

</div> 
        </div>
        <div class="row">
          <div class="col-xs-12 slogan">

          </div>
        </div>

      </div>

    </section>

  <div id="centerLayer">

  <script src="./jquery.min.js"></script>
  <script src="./jquery.scrollupformenu.js"></script>
  <script src="./EasePack.min.js"></script>
  <script src="./raf.min.js"></script>
  <script src="./TweenLite.min.js"></script>
  <script src="./picker.js"></script>
  <script src="./picker.date.js"></script>
  <script src="./js/legacy.js"></script>
  <script src="./jquery.maskedinput.min.js"></script>
  <script src="./common.js"></script>
</div>

</body>
</html>
