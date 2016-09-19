<?php if (!defined('THINK_PATH')) exit();?><html>
<head>

    <!-- Bootstrap -->
    <link href="/Application/Static/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/Application/Static/Public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/Application/Static/Public/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="/Application/Static/Public/assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/Application/Static/Public/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="/Application/Static/Public/vendors/jquery-1.9.1.min.js"></script>

    <script src="/Application/Static/Public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Application/Static/Public/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="/Application/Static/Public/assets/scripts.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"
          href="/Application/Static/Public/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
    <script src="/Application/Static/Public/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="/Application/Static/Public/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="/Application/Static/Public/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="/Application/Static/Public/vendors/ckeditor/ckeditor.js"></script>
    <script src="/Application/Static/Public/vendors/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="/Application/Static/Public/vendors/tinymce/js/tinymce/tinymce.min.js"></script>


    <link href="/Application/Static/Public/vendors/datepicker.css" rel="stylesheet" media="screen">
    <link href="/Application/Static/Public/vendors/uniform.default.css" rel="stylesheet" media="screen">
    <link href="/Application/Static/Public/vendors/chosen.min.css" rel="stylesheet" media="screen">
    <link href="/Application/Static/Public/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">
    <script src="/Application/Static/Public/vendors/jquery.uniform.min.js"></script>
    <script src="/Application/Static/Public/vendors/chosen.jquery.min.js"></script>
    <script src="/Application/Static/Public/vendors/bootstrap-datepicker.js"></script>
    <script src="/Application/Static/Public/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
    <script src="/Application/Static/Public/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>
    <script src="/Application/Static/Public/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
    <script type="text/javascript" src="/Application/Static/Public/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/Application/Static/Public/assets/form-validation.js"></script>
</head>
<title>Admin Home Page</title>


<div class="container-fluid">
    <form action= "<?php echo getNavUrlEx('Index','login');?>" id="aastroy_login_form" class="form-horizontal" method="post">
        <div class="form-group">
            <div>
                <input type="text" name="name" id="name" class="form-control" placeholder="账号">
            </div>
            <div>
                <input type="password" name="password" id="password" class="form-control" required="required"
                       placeholder="密码">
            </div>
            <!--<div>-->
            <!--<input type="text" name="verify" id="verify" class="form-control" required="required" placeholder="验证码">-->
            <!--<div class="input-group-btn"><img src=<?php echo getNavUrlEx('Index','verify','');?> id="verify_code" height="34"></div>-->
            <!--<div class="input-group-btn"><img src="/?c=Users&a=verify" id="verify_code" height="34"></div>-->
            <!--<div class="input-group-btn"><img src="http://www.test3.cm/admin.php/Index/verify" id="verify_code" height="34"></div>-->
            <!--</div>-->
            <div>
                <input type="submit" name="submit" class="btn btn-submit" value="提交">
            </div>
        </div>
    </form>
</div>
<script>

    $('#aastroy_login_form').submit(function(event){
        event.preventDefault();
        var name = $('#name').val();
        var password = $('#password').val();
        $.ajax({
            url: $(this).attr('action'),
            data : {
                'name':name,
                'password':password
            },
            type : "post",
            dataType : "json",
            success : function(data) {alert("登陆称谷歌");
                if(!data.status){
                    alert(data.content);
                }else {
                    window.location.href = '/admin.php';
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('失败'+textStatus+":"+errorThrown+":"+XMLHttpRequest.status);
            },
        });
    });
</script>

</body>
</html>