<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Triangle</title>
    <link href="/Application/Static/Public/vendors/triangle/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Application/Static/Public/vendors/triangle/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Application/Static/Public/vendors/triangle/css/animate.min.css" rel="stylesheet"> 
    <link href="/Application/Static/Public/vendors/triangle/css/lightbox.css" rel="stylesheet"> 
	<link href="/Application/Static/Public/vendors/triangle/css/main.css" rel="stylesheet">
	<link href="/Application/Static/Public/vendors/triangle/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       


    <link rel="shortcut icon" href="/Application/Static/Public/vendors/triangle/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Application/Static/Public/vendors/triangle/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Application/Static/Public/vendors/triangle/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Application/Static/Public/vendors/triangle/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/Application/Static/Public/vendors/triangle/images/ico/apple-touch-icon-57-precomposed.png">




    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "7e8eb33b-fbe0-4915-9b93-09490e3d10df", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <script type="text/javascript" src="/Application/Static/Public/vendors/triangle/js/jquery.js"></script>
    <script type="text/javascript" src="/Application/Static/Public/vendors/triangle/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Application/Static/Public/vendors/triangle/js/lightbox.min.js"></script>
    <script type="text/javascript" src="/Application/Static/Public/vendors/triangle/js/wow.min.js"></script>
    <script type="text/javascript" src="/Application/Static/Public/vendors/triangle/js/main.js"></script>  

</head><!--/head-->

<body>
	<header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>


                            <?php if(!empty($uid)): ?><li><a href="/?c=Users&a=index">欢迎，<?php echo ($userInfo['user_nicename']); ?></a></li>
                                    <li><a href="/?c=Users&a=logout">退出</a></li>
                                <?php else: ?>
                                    <li><a href="/?c=Users&a=index">登陆/注册</a></li><?php endif; ?>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                    	<h1><img src="/Application/Static/Public/vendors/triangle/images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">开始</a></li>
                        <li class="dropdown"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="aboutus.html">About</a></li>
                                <li><a href="aboutus2.html">About 2</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                                <li><a href="contact2.html">Contact us 2</a></li>
                                <li><a href="404.html">404 error</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>                  
                        <li class="dropdown"><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Blog Default</a></li>
                                <li><a href="blogtwo.html">Timeline Blog</a></li>
                                <li><a href="blogone.html">2 Columns + Right Sidebar</a></li>
                                <li><a href="blogthree.html">1 Column + Left Sidebar</a></li>
                                <li><a href="blogfour.html">Blog Masonary</a></li>
                                <li><a href="blogdetails.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">商家 <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="portfolio.html">Portfolio Default</a></li>
                                <li><a href="portfoliofour.html">Isotope 3 Columns + Right Sidebar</a></li>
                                <li><a href="portfolioone.html">3 Columns + Right Sidebar</a></li>
                                <li><a href="portfoliotwo.html">3 Columns + Left Sidebar</a></li>
                                <li><a href="portfoliothree.html">2 Columns</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            </ul>
                        </li>                         
                        <li><a href="shortcodes.html ">Shortcodes</a></li>                    
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
   <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Shortcodes</h1>
                            <p>A Cool Collection of Bootstrap Shortcodes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section id="shortcodes">
        <div class="container">
            <div id="tab-container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">Tab</h2>
                    </div>
                    <div class="col-md-12">
                        <ul id="tab1" class="nav nav-tabs">
                            <li class="active"><a href="#tab1-item1" data-toggle="tab">登陆</a></li>
                            <li><a href="#tab1-item2" data-toggle="tab">注册</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab1-item1">
                                <div class="col-md-4 col-sm-12">

                                    <div class="contact-form bottom">

                                        <form id="ananinfo-contact-form" name="contact-form" method="post" action="/?c=Users&a=login">
                                            <div class="form-group">
                                                <input type="text" name="name"  id="name"  class="form-control" required="required" placeholder="账号">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password"  id="password"  class="form-control" required="required" placeholder="密码">
                                            </div>
 
                                            <div class="input-group">
                                                <input type="text" name="verify" id="verify" class="form-control" required="required" placeholder="验证码">
                                                <div class="input-group-btn"><img src="/?c=Users&a=verify"  id="verify_code" height="34"> </div> 
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                                            </div>
                                            

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab1-item2">
                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!--/#table-container-->
        </div>
    </section> 
    <script>
        $('#verify_code').click(function(){
                $('#verify_code').attr('src','/?c=Users&a=verify');
        });

        $('#ananinfo-contact-form').submit(function(event){
            event.preventDefault();
            var name = $('#name').val();
            var password = $('#password').val();
            var verify_code = $('#verify').val();
            $.ajax({
                url: $(this).attr('action'),
                data : {
                        'verify_code' : verify_code,
                        'name':name,
                        'password':password
                    },
                type : "post",
                dataType : "json",
                    success : function(data) {
                        if(!data.status){
                            alert(data.content);
                            $('#verify_code').attr('src','/?c=Users&a=verify');
                        }else {
                            window.location.href = '/';
                        }
                    }
            });
        });
</script>
   <!-- <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>Testimonial</h2>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="images/home/profile1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat labore tail.</blockquote>
                                <h3><a href="#">- Jhon Kalis</a></h3>
                            </div>
                         </div>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="images/home/profile2.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Capicola nisi flank sed minim sunt aliqua rump pancetta leberkas venison eiusmod.</blockquote>
                                <h3><a href="">- Abraham Josef</a></h3>
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                        E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br> 
                        Phone: +1 (123) 456 7890 <br> 
                        Fax: +1 (123) 456 7891 <br> 
                        </address>

                        <h2>Address</h2>
                        <address>
                        Unit C2, St.Vincent's Trading Est., <br> 
                        Feeder Road, <br> 
                        Bristol, BS2 0UY <br> 
                        United Kingdom <br> 
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Your Company 2014. All Rights Reserved.</p>
                        <p>Designed by <a target="_blank" href="http://www.themeum.com">Themeum</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>-->
    <!--/#footer-->
</body>
</html>