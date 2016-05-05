// JavaScript Document
$(function(){
 var sw = 0;
 $(".indexbanner .num2 a").mouseover(function(){
  sw = $(".num2 a").index(this);
  myShow(sw);
 });

 function myShow(i){
  $(".indexbanner .num2 a").eq(i).addClass("cur").siblings("a").removeClass("cur");
  $(".indexbanner ul li").eq(i).stop(true,true).fadeIn(800).siblings("li").fadeOut(800);
 }

 //滑入停止动画，滑出开始动画
 $(".indexbanner").hover(function(){
  if(myTime){
     clearInterval(myTime);
  }
 },function(){
  myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==3){sw=0;}
  } , 6000);
 });

 //自动开始
 var myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==3){sw=0;}
 } , 6000);
})
<!--结束 -->
