/*��ԭ��������,ֻ�趨��dataForWeixin�������callback��Ϊ����ɹ��Ļص�*/
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
    		title: "�ѷ��",
    		desc: "�ѷ��",
    		callback:function(){}
		}
	}
	dataForWeixin.params_act={
      title: dataForWeixin.title,
      desc: dataForWeixin.desc,
      link: dataForWeixin.url,
      imgUrl: dataForWeixin.TLImg,
      trigger: function (res) {
        //alert('�û�������͸�����');
      },
      success: function (res) {
        dataForWeixin.callback();
      },
      cancel: function (res) {
        //alert('��ȡ��');
      },
      fail: function (res) {
        //alert(JSON.stringify(res));
        alert('����ʧ��');
      }
    }
dataForWeixin.params_actpy={
      title: dataForWeixin.desc,
      desc: dataForWeixin.title,
      link: dataForWeixin.url,
      imgUrl: dataForWeixin.TLImg,
      trigger: function (res) {
        //alert('�û�������͸�����');
      },
      success: function (res) {
        dataForWeixin.callback();
      },
      cancel: function (res) {
        //alert('��ȡ��');
      },
      fail: function (res) {
        //alert(JSON.stringify(res));
        alert('����ʧ��');
      }
    }
	wx.onMenuShareAppMessage(dataForWeixin.params_act);
	wx.onMenuShareTimeline(dataForWeixin.params_actpy);
	wx.onMenuShareQQ(dataForWeixin.params_act);
	wx.onMenuShareWeibo(dataForWeixin.params_act);
	
	
})