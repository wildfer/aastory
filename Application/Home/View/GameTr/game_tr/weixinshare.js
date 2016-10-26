/*与原分享类似,只需定义dataForWeixin对象，添加callback作为分享成功的回调*/
wx.ready(function () {
	var dataForWeixin;
	if(window.dataForWeixin)
	{
	dataForWeixin=window.dataForWeixin;
	}
	else
	{
	dataForWeixin={
			TLImg: '',
    		url: 'http://m.fang.com',
    		title: "搜房活动",
    		desc: "搜房活动",
    		callback:function(){}
		}
	}
	dataForWeixin.params_act={
      title: dataForWeixin.title,
      desc: dataForWeixin.desc,
      link: dataForWeixin.url,
      imgUrl: dataForWeixin.TLImg,
      trigger: function (res) {
        //alert('用户点击发送给朋友');
      },
      success: function (res) {
        dataForWeixin.callback();
      },
      cancel: function (res) {
        //alert('已取消');
      },
      fail: function (res) {
        //alert(JSON.stringify(res));
        alert('分享失败');
      }
    }
dataForWeixin.params_actpy={
      title: dataForWeixin.desc,
      desc: dataForWeixin.title,
      link: dataForWeixin.url,
      imgUrl: dataForWeixin.TLImg,
      trigger: function (res) {
        //alert('用户点击发送给朋友');
      },
      success: function (res) {
        dataForWeixin.callback();
      },
      cancel: function (res) {
        //alert('已取消');
      },
      fail: function (res) {
        //alert(JSON.stringify(res));
        alert('分享失败');
      }
    }
	wx.onMenuShareAppMessage(dataForWeixin.params_act);
	wx.onMenuShareTimeline(dataForWeixin.params_actpy);
	wx.onMenuShareQQ(dataForWeixin.params_act);
	wx.onMenuShareWeibo(dataForWeixin.params_act);
	
	
})