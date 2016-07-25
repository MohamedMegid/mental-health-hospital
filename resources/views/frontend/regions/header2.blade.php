<nav id="ddmenu">
    <div class="menu-icon"></div>
<ul id="menu">
        <li class="no-sub"><a class="top-heading" href="http://www.google.com">Quisque</a></li>
        <li class="no-sub"><a class="top-heading" href="http://www.google.com">Quisque</a></li>
        <li class="no-sub"><a class="top-heading" href="http://www.google.com">Quisque</a></li>
        <li class="no-sub"><a class="top-heading" href="http://www.google.com">Quisque</a></li>
    <li><a href='/home'><span>الرئيسية</span></a></li>
               <li><a href='/news'><span>الاخبار</span></a></li>
               <li class='active has-sub'><a href='#'><span>نبذة عنا</span></a>
                  <ul>
                     <li><a href='/specialpages/1'><span>كلمة المدير</span></a>
                     </li>
                     <li><a href='/specialpages/2'><span>الرسالة و الرؤية</span></a>
                     </li>
                     <li><a href='/specialpages/3'><span>الهيكل التنظيمي</span></a>
                     </li>
                     <li><a href='/specialpages/4'><span>حقوق المستخدمين</span></a>
                     </li>
                  </ul>
               </li>
               <li class='last'><a href='/contact-us'><span>اتصل بنا</span></a></li>
               <li class='last'><a href='/med-consulting'><span>الاستشارات</span></a>
                  <?php if (!empty(Auth::user())){
                          $user_id = Auth::user()->role_id; 
                        }
                  ?>
                  @if (!empty($user_id))
                  @if ($user_id == 2 || $user_id == 1)
                    <ul>
                         <li class='has-sub'><a href='/doctor/med-consulting/consulting'><span>قائمة الاستشارات</span></a>
                         </li>
                    </ul>
                  @endif
                  @endif
               </li>
               <li class='last'><a href='/pgallery'><span> معرض الصور</span></a></li>
               <li class='last'><a href='/vgallery'><span> معرض الفيديو</span></a></li>
               <li class='active has-sub'><a href='#'><span>صفحات اخرى</span></a>
                  <ul>
                  @if ($pages->count())
                      @foreach ($pages as $page)
                         <li><a href='/page/{{$page->path}}/{{$page->id}}'><span> {{$page->name}}</span></a>
                         </li>
                      @endforeach
                  @endif
                  </ul>
               </li>
               @if (Auth::check())
                                <li style="float:left !important;"><a href="/auth/logout"><i class="fa fa-user"></i> خروج</a></li>
                                <li style="float:left !important;"><a href="/auth/profile"><i class="fa fa-user"></i> حسابي</a></li>
                            @else
                            <li class="flt" style="float:left !important;"><a href="/auth/register"><i class="fa fa-user"></i> تسجيل</a></li>
                            <li class="flt" style="float:left !important;"><a href="/auth/login"><i class="fa fa-user"></i> دخول</a></li>
                            @endif
</ul>
</nav>
    <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1 style="font-size: 25px;"><a href="#">{{$content->org_spec}}<span> {{$content->org_name}}</span></a></h1>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                  <img src="/img/uploaded/logo/{{ $content->basic_photo }}" style="height:69px;width:100%;float:left;margin-top:21px;"></div>
                </div>
                
            </div>
    </div>
<style type="text/css">
#menu li {
    float: right;
    direction: rtl !important;
    border-right: 1px solid #222;
    box-shadow: 1px 0 0 #444;
    position: relative;
}

#menu a {
    float: left;
    padding: 12px 30px;
    color: white;
    text-transform: uppercase;
    font: bold 12px Arial, Helvetica;
    text-decoration: none;
    text-shadow: 0 1px 0 #000;
}

#menu li:hover > a {
    color: #fafafa;
}

*html #menu li a:hover { /* IE6 only */
    color: #fafafa;
}
#menu:before,
#menu:after {
    content: "";
    display: table;
}

#menu:after {
    clear: both;
}

#menu {
    zoom:1;
} 
#menu {
    width: 100%;
    margin: 60px auto;
    border: 1px solid #222;
    background-color: #111;
    background-image: linear-gradient(#444, #111);
    border-radius: 6px;
    box-shadow: 0 1px 1px #777;
}
#menu, #menu ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
#menu ul {
    margin: 20px 0 0 0;
    _margin: 0; /*IE6 only*/
    opacity: 0;
    visibility: hidden;
    position: absolute;
    top: 38px;
    left: 0;
    z-index: 1;    
    background: #444;   
    background: linear-gradient(#444, #111);
    box-shadow: 0 -1px 0 rgba(255,255,255,.3);  
    border-radius: 3px;
    transition: all .2s ease-in-out;
}

#menu li:hover > ul {
    opacity: 1;
    visibility: visible;
    margin: 0;
}

#menu ul ul {
    top: 0;
    left: 150px;
    margin: 0 0 0 20px;
    _margin: 0; /*IE6 only*/
    box-shadow: -1px 0 0 rgba(255,255,255,.3);      
}

#menu ul li {
    float: none;
    display: block;
    border: 0;
    _line-height: 0; /*IE6 only*/
    box-shadow: 0 1px 0 #111, 0 2px 0 #666;
}

#menu ul li:last-child {   
    box-shadow: none;    
}

#menu ul a {    
    padding: 10px;
    width: fixed;
    _height: 10px; /*IE6 only*/
    display: block;
    white-space: nowrap;
    float: none;
    text-transform: none;
}

#menu ul a:hover {
    background-color: #0186ba;
    background-image: linear-gradient(#04acec, #0186ba);
}
</style>

   <link href="{{ asset('assets\frontend\ddmenu/ddmenu.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets\frontend\ddmenu/ddmenu.js') }}" type="text/javascript"></script>