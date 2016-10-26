/**
 * Created by user on 2016/1/21.
 */
/**
 * @file turntable activity
 * @author 鍗曢噺
 * @version 20150921
 */
$(document).ready(function () {
    'use strict';
    var nextpos = 0;
    var angles = 0;
    var total = 0;
    var lotterytran = '';
    var lotteryspup = '';
    var lotteryfin = '';
    var fintotal = 0;
    var finTime = 0;
    var finA = 0;
    var finrotatetotal = 0;
    var timer = 0;
    var islock = false;
    var isscroll = true;

    function lotteryfun(total) {
        $('#lotteryBtn').css({
            '-webkit-transform': 'rotate(' + total + 'deg)',
            '-o-transform': 'rotate(' + total + 'deg)',
            '-moz-transform': 'rotate(' + total + 'deg)',
            transform: 'rotate(' + total + 'deg)'
        });
    }
    var isStop = false;
    var isGetPrize = false;//判断是否中奖

    var locationurl = window.location.href;
    function lotterystop(times) {
        lotteryfin = setTimeout(function () {
            total += angles;
            angles -= 1 / finA;
            lotteryfun(total);
            if (times + 1 > finTime) {
                if(isStop){//转动指针已经停止而且已获奖
                    setTimeout(function(){
                        $(".phone").val("");
                        $(".vcode").val("");
                        $(".js_phoneWarn").hide();
                        $(".js_vcodeWarn").hide();
                        if (isGetPrize){//用户未登录,已经中奖
                            $(".sendcode").html('获取验证码');
                            stopDumiao = true;
                            $("#login_btn").attr("src",location.protocol+"//js.soufunimg.com/wireless_m/touch/activity/newWheelLottery/images/but02.png");
                            $('.cpResultbox').addClass('cpgzshow').show();
                        }else{
                            $(".js_prizeResultOrNot").html("好遗憾，就差一点了");
                            $('#getPrizeOrNotButtonUrl').show();
                            $('#zailaiyici').hide();
                            $('#chakanjiangpin').hide();
                            $('.cpResultbox').addClass('cpResultshow').show();
                        }
                        islock = false;
                        isGetPrize = false;
                    },1000);
                }
                isStop = false;
                isscroll = true;
                bodyscroll();
            }
        }, times * 50);
        times++;
        if (times > finTime) {
            clearTimeout(lotteryfin);
            return false;
        }
        lotterystop(times);
    }


    function lotterygoon() {
        clearTimeout(lotterytran);
        var lotteryroll = setInterval(function () {
            total += 48;
            lotteryfun(total);
        }, 50);

        //抽奖---------------------发送请求
        var url = "/?c=GameTr&a=begin";
        $.getJSON(url,{lotteryId:_var_lotteryId},function(data){
            //var isLogin = data.isLogin;
            isGetPrize = data.isGetPrize;
            var angle = data.angle;
            var prizeName = data.prizeName;
            var prizeUrl = data.prizeUrl.replace(/&amp;/g,'&');
            $("#js_prizeName").html(prizeName);
            if(prizeUrl==''){
            	//没有跳转地址就跳到我的奖品页
            	$("#chakanjiangpin").one("click",function(){
            		 window.location.href="/huodongAC.d?m=getWinListSelf&class=NewWheelLotteryHc&lotteryId="+_var_lotteryId;
                });
            }else{
            	 $("#chakanjiangpin").one("click",function(){
                     window.location.href=prizeUrl;  //弹层按钮跳转地址
                 });
            }             
            $(".js_getPrizeDescript").html("恭喜您获得"+prizeName);//用户未登陆后给出的提示
            $(".js_prizeResultOrNot").html("恭喜您获得"+prizeName);//用户已经登陆后给出的提示
            fintotal = (angle - 1) * 45 + 22;
            clearInterval(lotteryroll);

            fintotal = (Math.floor(total / 360) + 3) * 360 + fintotal - total;

            finA = fintotal / finrotatetotal;

            timer = angles;
            for (; ; finTime++) {

                timer -= 1 / finA;
                if (timer < 0) {
                    finTime -= 1;
                    break;
                }
            }
            isStop = true;
            lotterystop(0);
        });
    }


    function lotteryStart(times) {
        lotteryspup = setTimeout(function () {

            angles++;
            total += angles;

            finrotatetotal = total;

            lotteryfun(total);
        }, times * 50);

        if (times === 49) {

            if (lotteryspup !== '') {
                clearTimeout(lotteryspup);
            }

            lotterytran = setTimeout(function () {
                lotterygoon();
            }, times * 50);
            return false;
        }
        times++;

        lotteryStart(times);
    }

    function bodyscroll() {
        if(!isscroll){
            $('body').on('touchmove', function(e){
                e.preventDefault();
            })
        } else {
            $('body').off('touchmove');
        }
    }

    //绑定转盘滚动事件
    $('#lotteryStart').on('click', function () {
        //先判断这个活动是否需要登录
        if(playLogin=="true"){//玩之前需要登录
            $('.cpResultbox').addClass('playLoginShow').show();
            return false;
        }
        if(isFromAPP=="false"){//玩之前需要登录
            $(".js_prizeResultOrNot").html("请在房APP中打开");
            $('.cpResultbox').addClass('cpResultshow').show();
            $("#nexthint").one("click",function(){
                window.location.href=location.protocol+'//a.app.qq.com/o/simple.jsp?pkgname=com.soufun.app&g_f=991653';  //跳到APP下载页
            });
            return false;
        }
        if (islock) {
            return false;
        }
        islock = true;
        var text = $('.turntableli_' + nextpos).text();
        if (fintotal !== 0) {
            nextpos = 0;
            angles = 0;
            total = 0;
            fintotal = 0;
            finTime = 0;
            finA = 0;
            finrotatetotal = 0;
            timer = 0;
        }
        lotteryStart(0);
        isscroll = false;
        bodyscroll();
    });

    $('#share').on('click', function (e) {
        if (true) {
            $('.cpResultbox').removeClass('shareshow').hide();
        }
        e.preventDefault();
    });

    $('.popruleclose').on('click', function (e) {
        if (true) {
            $('.cpResultbox').removeClass('popruleshow').hide();
        }
        e.preventDefault();
    });

    $('.cpgzclose').on('click', function (e) {
        if (true) {
            $('.cpResultbox').removeClass('cpgzshow').hide();
            stopDumiao = false;
            //清空手机号和验证码
            $(".phone").val("");
            $(".vcode").val("");
            $(".js_phoneWarn").hide();
            $(".js_vcodeWarn").hide();

        }
        e.preventDefault();
    });

    $('.cpResultclose').on('click', function (e) {
        if (true) {
            $('.cpResultbox').removeClass('cpResultshow').hide();
        }
        e.preventDefault();
    });


    $('#poprule').on('click', function () {
        if (islock) {
            return false;
        }
        $('.cpResultbox').addClass('popruleshow').show();
    });

    $('#wxshare').on('click', function () {
        if (islock) {
            return false;
        }
        $('.cpResultbox').addClass('shareshow').show();
        setTimeout(function(){
            $('.cpResultbox').removeClass('shareshow').hide();
        },3000);
    });

    $('#nexthint').on('click', function (e) {
        if (true) {
            $('.cpResultbox').removeClass('cpResultshow').hide();
        }
        e.preventDefault();
    });
     //再来一次按钮
    $('#zailaiyici').on('click', function (e) {
        if (true) {
            $('.cpResultbox').removeClass('cpResultshow').hide();
        }
        e.preventDefault();
    });
    $('.mask').on('click', function () {
        if ($('.cpResultbox').hasClass('popruleshow')) {
            $('.cpResultbox').removeClass('popruleshow').hide();
        } else if ($('.cpResultbox').hasClass('shareshow')) {
            $('.cpResultbox').removeClass('shareshow').hide();
        } else if ($('.cpResultbox').hasClass('cpResultshow')) {
            $('.cpResultbox').removeClass('cpResultshow').hide();
        }
    });
    /**********************************王***********************************/
        //点击我的奖品还是点击领奖

    $('#myprize').on('click', function () {
        if (islock) {
            return false;
        }
        if(_var_isLogin){
            window.location.href="/huodongAC.d?m=getWinListSelf&class=NewWheelLotteryHc&lotteryId="+_var_lotteryId;
        }else{
            $(".js_getPrizeDescript").html("");
            $(".phone").val("");
            $(".vcode").val("");
            $(".js_phoneWarn").hide();
            $(".js_vcodeWarn").hide();
            $(".sendcode").html('获取验证码');
            $("#login_btn").attr("src",location.protocol+"//js.soufunimg.com/wireless_m/touch/activity/newWheelLottery/images/but03.png");
            $('.cpResultbox').addClass('cpgzshow').show();
            stopDumiao = true;
            prizeListOrPhoneUpdate = true;
        }
    });

    //输入手机号和验证码，更新手机号,领奖
    $("#login_btn").on("click",function(){
        var vcode=$("#updateCode").val();
        var phone=$("#updatePhone").val();
        if(phone==""){
            $(".js_phoneWarn").html("手机号不能为空1");
            $(".js_phoneWarn").show();
            return false;
        }
        if(vcode==""){
            $(".js_phoneWarn").hide();
            $(".js_vcodeWarn").html("验证码不能为空");
            $(".js_vcodeWarn").show();
            return ;
        }
        isSending = false;
        sendVerifyCodeAnswer(phone, vcode,
            function () {
                // 验证码验证成功
                if(prizeListOrPhoneUpdate){
                    getMyWinList(phone,vcode);
                }else{
                    updateWinPhone(phone,vcode);
                }
            }, function () {
            	alert("验证码错误");
            	$(".js_phoneWarn").hide();
                $(".js_vcodeWarn").html("验证码验证错误");
                $(".js_vcodeWarn").show();              
                return false;
            });
    });
});

(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
            if (clientWidth >= 640) {
                docEl.style.fontSize = 40 + 'px';
            }
        };

    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);

function addEventSimple(obj, evt, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
    } else if (obj.attachEvent) {
        obj.attachEvent('on' + evt, fn);
    }
}

addEventSimple(window, 'load', initScrolling);
var scrollingBox;
var scrollingInterval;
var reachedBottom = false;
var bottom;

function scrolling() {
    var origin = scrollingBox.scrollTop++;
    if (origin === scrollingBox.scrollTop) {
        if (!reachedBottom) {
            scrollingBox.innerHTML += scrollingBox.innerHTML;
            reachedBottom = true;
            bottom = origin;
        } else {
            scrollingBox.scrollTop = bottom;
        }
    }
}

function over() {
    clearInterval(scrollingInterval);
    setTimeout(function(){
        out();
    }, 2000);
}

function out() {
    scrollingInterval = setInterval(function () {
        scrolling();
    }, 50);
}

function initScrolling() {
    scrollingBox = document.getElementById('xst');
    if($('.w70').length > 2){
        scrollingBox.style.overflow = 'hidden';
        scrollingInterval = setInterval(function () {
            scrolling();
        }, 50);
        scrollingBox.onmouseover = over;
    }
}


/********************************************小王代码 2015-10-10 星期六**************************************************************/
if(_var_stopOrEnd=="未开始"||_var_stopOrEnd=="已结束"){
    $('.cpResultbox').addClass('startOrEndshow').show();
}

//点击获取验证码
$(".sendcode").on('click',getPhonecode);
//获取手机号验证码
var isSending = false;
var time_count = 60;
function getPhonecode(){
    if(isSending){
        return false;
    }
    var phone = $(".phone").val();
    //验证手机格式
    if(!validatemobile(phone)){
        return ;
    }
    getPhoneVerifyCode(phone,
        function () {
            updateTime();
        }, function () {
            $(".js_phoneWarn").hide();
            $(".js_vcodeWarn").html("验证码获取失败");
            $(".js_vcodeWarn").show();
        });
}

//验证手机格式
function validatemobile(mobile)
{
    if(mobile.length==0)
    {
        $(".js_phoneWarn").html("手机号不能为空");
        $(".js_phoneWarn").show();
        $(".phone").focus();
        return false;
    }
    if(mobile.length!=11)
    {
        $(".js_phoneWarn").html("请输入有效的手机号码！");
        $(".js_phoneWarn").show();
        $(".phone").focus();
        return false;
    }

    var myreg = /^(((13)|14|15|18|17)+\d{9})$/;
    if(!myreg.test(mobile))
    {
        $(".js_phoneWarn").html("请输入有效的手机号码！");
        $(".js_phoneWarn").show();
        $(".phone").focus();
        return false;
    }else{
        $(".js_phoneWarn").hide();
        return true;
    }
}

function updateTime(){
    time_count--;
    if(time_count>-1&&stopDumiao){
        $(".sendcode").html('重新发送('+time_count+')');
        setTimeout("updateTime()",1000);
        isSending = true;
    }else{
        $(".sendcode").html('重新获取');
        time_count = 60;
        isSending = false;
    }
}
//查看自己的中奖纪录
function getMyWinList(phone,vcode){
    $(".js_vcodeWarn").hide();
    var url = "/huodongAC.d?m=checkVocode&class=NewWheelLotteryHc";
    $.getJSON(url,{phone:phone,vcode:vcode},function(data){
        var checkVcode = data.root.checkVcode;
        var phoneNull = data.root.phoneNull;
        var vcodeNull = data.root.vcodeNull;
        var key = data.root.key;
        if(phoneNull){
            $(".js_phoneWarn").html("手机号不能为空3");
            $(".js_phoneWarn").show();
            return;
        }
        if(vcodeNull){
            $(".js_phoneWarn").hide();
            $(".js_vcodeWarn").html("验证码不能为空");
            $(".js_vcodeWarn").show();
            return;
        }
        if(checkVcode=="fail"){
            $(".js_phoneWarn").hide();
            $(".js_vcodeWarn").html("验证码错误，请重新输入");
            $(".js_vcodeWarn").show();
            return;
        }
        if(checkVcode=='success'){
            $("#updateCode").html("");//情况电话号码和验证码
            $("#updatePhone").html("");
            window.location.href="/huodongAC.d?m=getWinListSelf&class=NewWheelLotteryHc&key="+key+"&lotteryId="+_var_lotteryId;
        }
    });
    prizeListOrPhoneUpdate = false;
}

//更新中奖手机号
function updateWinPhone(phone,vcode){
    var url = "/huodongAC.d?m=updateNewWheelWinPhone&class=NewWheelLotteryHc";
    $.getJSON(url,{phone:phone,vcode:vcode,lotteryId:_var_lotteryId},function(data){
        var checkVcode = data.root.checkVcode;
        var canWin = data.root.canWin;
        var winMessage = data.root.winMessage;
        var updatePhone = data.root.updatePhone;
        var key = data.root.key;
        if(checkVcode=="fail"){
            $(".js_phoneWarn").hide();
            $(".js_vcodeWarn").html("验证码错误，请重新输入");
            $(".js_vcodeWarn").show();
            return;
        }
        if(!canWin){       
        	alert(winMessage);       
            return ;
        }
        if(updatePhone=='success'){
            $("#updateCode").html("");//情况电话号码和验证码
            $("#updatePhone").html("");
            $(".sendcode").html('获取验证码');
            stopDumiao = false;
            $('.cpResultbox').removeClass('cpgzshow').hide();
            window.location.href="/huodongAC.d?m=getWinListSelf&class=NewWheelLotteryHc&key="+key+"&lotteryId="+_var_lotteryId;
        }
    });
}
