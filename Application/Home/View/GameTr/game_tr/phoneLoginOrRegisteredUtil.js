function PhoneLoginOrRegisteredUtil(e, i) {
    this.phonestr = e, this.servicestr = "soufun-lottery-wap", this.callbackfn = i, this.initPhoneCode(this)
}
function sendPhoneLoginOrRegisteredCode(e, i, o) {
    var n = "/?c=GameTr&a=checkSmsverify&mobilephone=" + e + "&mobilecode=" + i;
    $.ajax({
        type: "get",
        async: !1,
        url: n,
        timeout: 3e4,
        dataType: "jsonp",
        jsonp: "callback",
        //jsonpCallback: "flightHandler",
        success: function (json) {
            //console.log("Message==" + e.Message + "Tip===" + e.Tip + "sfut==" + e.sfut), o("Success" === e.Message ? !0 : !1)
            //alert(json.msg);
            //验证码错误
            if(json.msg=='error'){
                o(!1);
            }

        },
        error: function () {
            o(!1)
        }
    })
}
function getPhoneVerifyCode(e, i, o) {
    new PhoneLoginOrRegisteredUtil(e, function (e) {
        e ? null !== i && "" !== i && i() : null !== o && "" !== o && o()
    })
}
function sendVerifyCodeAnswer(e, i, o, n) {
    var t = (new Date).getTime();
    0 === sendCodeReqTimeInterVal ? (sendCodeReqTimeInterVal = t, sendPhoneLoginOrRegisteredCode(e, i, function (e) {
        e ? null !== o && "" !== o && o() : null !== n && "" !== n && n()
    })) : t - sendCodeReqTimeInterVal > 5e3 ? (sendCodeReqTimeInterVal = t, sendPhoneLoginOrRegisteredCode(e, i, function (e) {
        e ? null !== o && "" !== o && o() : null !== n && "" !== n && n()
    })) : alert("发送请求中，请勿频繁点击！")
}
PhoneLoginOrRegisteredUtil.prototype.initPhoneCode = function (e) {
    var i = "/?c=GameTr&a=send_smsverify&mobilephone=" + e.phonestr;
    e.sendCodeReq(e, i)
}, PhoneLoginOrRegisteredUtil.prototype.sendCodeReq = function (e, i) {
    $.ajax({
        type: "get",
        async: !1,
        url: i,
        timeout: 3e4,
        dataType: "jsonp",
        jsonp: "callback",
        //jsonpCallback: "flightHandler",
        success: function (json) {
            //$(".user").html("用户信息："+json.username+","+json.age+","+json.gender);
            console.log(json.msg);
        },
        error: function () {
            alert("发送失败"), e.callbackfn()
        }

    })
}, PhoneLoginOrRegisteredUtil.prototype.initCodeWinDom = function (e) {
    if ($("#phoneDivImgVerify1").length < 1) {
        var i = '<div id="phoneDivImgVerify1" style="position: fixed;width: 100%;height: 100%;left: 0;top: 0;background: rgba(0,0,0,0.3);z-index: 998;"><div id="phoneDivImgVerify2" style="position: relative;padding: 20px 15px;width: 250px;background-color: #ffffff;margin: -67px auto 0;top: 50%;"><div id="phoneDivImgVerify3" style="border: 1px solid #dedede;padding: 10px 5px 10px 5px;border-radius: 4px;"><img id="phoneGetImgVerifyCode"><input id="phoneImgVerifyCodeId" type="text" placeholder="验证码" style="position: relative;display: flex;top: -33px;left: 150px;width: 80px;padding-left: 5px;font-size: 15px;line-height: 24px;"></div><div id="phoneDivImgVerify4" style="margin-top: 15px;"><a id="phoneImgVerifyCodeSubmit" style="background-color: #f00;line-height: 40px;width: 220px;margin: 0 auto;color: #ffffff;display: block;border-radius: 4px;text-align: center;">确 定</a></div></div></div>';
        $("body").append(i), $("#phoneGetImgVerifyCode").on("click", function () {
            e.refreshVerifyCode(e)
        }), $("#phoneImgVerifyCodeSubmit").on("click", function () {
            var i = e.submitCodeAnswer(e);
            if ("-0" !== i) {
                var o = "https://passport.fang.com/loginsendmsm.api?service=" + e.servicestr + "&mobilephone=" + e.phonestr + "&mathcode=" + i;
                e.sendCodeReq(e, o)
            }
        })
    } else $("#phoneDivImgVerify1").show();
    e.refreshVerifyCode(e)
}, PhoneLoginOrRegisteredUtil.prototype.refreshVerifyCode = function (e) {
    var i = 1e3 * Math.random(), o = parseInt(i, 10), n = o;
    o % 2 === 0 ? ($("#phoneDivImgVerify3").css("height", "80px"), n = "http://captcha.fang.com/Display?r=" + n, $("#phoneGetImgVerifyCode").attr("src", n)) : ($("#phoneDivImgVerify3").css("height", "30px"), n = "http://captcha.fang.com/Display?type=soufangbang&width=100&height=32&r=1354173503" + n, $("#phoneGetImgVerifyCode").attr("src", n))
}, PhoneLoginOrRegisteredUtil.prototype.submitCodeAnswer = function (e) {
    var i = $("#phoneImgVerifyCodeId").val().trim();
    return null === i || "" === i || "undefined" == typeof i ? (alert("验证码为空，请输入验证码！"), "-0") : ($("#phoneDivImgVerify1").hide(), i)
};
var sendCodeReqTimeInterVal = 0;