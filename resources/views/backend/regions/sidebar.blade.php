        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar "> 
                <div class="page-sidebar  sidebar-nav">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li class="active">
                            <a href="/admin/dashboard">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">لوحة التحكم</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/edit/info') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                <span class="title">بيانات مدير النظام</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/add/admins">
                                        اضافة مدير نظام جديد
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/edit/info">
                                        تحرير بيانات مدير النظام
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/edit/master') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                <span class="title">البيانات الرئيسية</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/edit/master">
                                        تحرير البيانات الرئيسية
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/news') ? 'active' : '' }} {{ Request::is('admin/news/*') ? 'active' : '' }} {{ Request::is('admin/news/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">الاخبار</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/news/create/1">
                                        اضافة خبر جديد
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/news">
                                        قائمة جميع الاخبار
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/news?title=&importance=&category=1">
                                        قائمة الاخبار العامة
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/comments') ? 'active' : '' }} {{ Request::is('admin/comments/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                <span class="title">التعليقات</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/comments">
                                        قائمة التعليقات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/news/create/2') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                                <span class="title">التثقيفية</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/news/create/2">
                                        اضافة اخبار تثقيفية
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/news?title=&importance=&category=2">
                                        قائمة الاخبار التثقيفية
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/news/create/3') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
                                <span class="title">الانجازات</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/news/create/3">
                                        اضافة الانجازات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/news?title=&importance=&category=3">
                                        قائمة الانجازات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/specialpages/1') ? 'active' : '' }} {{ Request::is('admin/specialpages/1/edit') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                                <span class="title">كلمة المدير</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/specialpages/1/edit">
                                        تحرير كلمة المدير
                                    <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/specialpages/2') ? 'active' : '' }} {{ Request::is('admin/specialpages/2/edit') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                                <span class="title">الرسالة و الرؤية</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/specialpages/2/edit">
                                        تحرير الرسالة و الرؤية
                                    <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/specialpages/3') ? 'active' : '' }} {{ Request::is('admin/specialpages/3/edit') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                                <span class="title">الهيكل التنظيمي</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/specialpages/3/edit">
                                        تحرير الهيكل التنظيمي
                                    <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/specialpages/4') ? 'active' : '' }} {{ Request::is('admin/specialpages/4/edit') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
                                <span class="title">حقوق المستخدمين</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/specialpages/4/edit">
                                        تحرير حقوق المستخدمين
                                    <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li  class="{{ Request::is('admin/contact-us') ? 'active' : '' }} {{ Request::is('admin/contact-us/*') ? 'active' : '' }} {{ Request::is('admin/contact-us/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">اتصل بنا</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/contact-us/gmap/edit">
                                        تحرير الموقع على الخريطة
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/contact-us/cont-info/edit">
                                        تحرير معلومات التواصل
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/contact-us/contacts">
                                        عرض الرسائل لم يتم الرد عليها
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                    <a href="/admin/contact-us/contacts-replied">
                                        عرض الرسائل تم الرد عليها
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li  class="{{ Request::is('admin/med-consulting') ? 'active' : '' }} {{ Request::is('admin/med-consulting/*') ? 'active' : '' }} {{ Request::is('admin/med-consulting/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">الاستشارات</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/med-consulting/info/edit">
                                        تحرير    النص التعريفي
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/med-consulting/consulting">
                                        عرض جميع الاستشارات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/register/user') ? 'active' : '' }} {{ Request::is('admin/register/users') ? 'active' : '' }} {{ Request::is('admin/register/users/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">تسجيل اعضاء</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/register/user">
                                        اضافة عضو جديد
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/register/users">
                                        قائمة الاعضاء
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/doctors/*') ? 'active' : '' }} {{ Request::is('admin/doctors/*/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                <span class="title">بطاقات الاعضاء</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/doctors/list">
                                        قائمة بطاقات الاعضاء
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/doctors/create">
                                        اضافة بطاقات الاعضاء
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/banners/*') ? 'active' : '' }} {{ Request::is('admin/banners/*/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">البنرات</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/banners/list">
                                        قائمة البنرات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/banners/create">
                                        اضافة بنر جديد
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/social-media') ? 'active' : '' }} {{ Request::is('admin/social-media/*') ? 'active' : '' }} {{ Request::is('admin/social-media/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">ايقونات شبكات التواصل الاجتماعي</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/social-media/create">
                                        اضافة شبكات التواصل الاجتماعي
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/social-media">
                                        قائمة شبكات التواصل الاجتماعي
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/friendly-sites/*') ? 'active' : '' }} {{ Request::is('admin/friendly-sites/*/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">المواقع الصديقة</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/friendly-sites/list">
                                        قائمة المواقع الصديقة
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/friendly-sites/create">
                                        اضافة المواقع الصديقة
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/pages') ? 'active' : '' }} {{ Request::is('admin/pages/*') ? 'active' : '' }} {{ Request::is('admin/pages/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                <span class="title">الصفحات</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/pages">
                                        قائمة الصفحات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                    <a href="/admin/pages/create">
                                         اضافة صفحة 
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li  class="{{ Request::is('admin/pgallery/*') ? 'active' : '' }} {{ Request::is('admin/pgallery/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">معرض الصور</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/pgallery/create">
                                        اضافة البوم صور 
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/pgallery/list">
                                        قائمة الالبومات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li  class="{{ Request::is('admin/vgallery/*') ? 'active' : '' }} {{ Request::is('admin/vgallery/*/*') ? 'active' : '' }} {{ Request::is('admin/vgallery/*/*/*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="livicon" data-name="barchart" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">معرض الفيديو</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/vgallery/create-album">
                                        اضافة البوم 
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/vgallery/list">
                                        قائمة الالبومات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/vgallery/create">
                                        اضافة فيديوهات
                                        <i class="fa fa-angle-double-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>
        
        <!-- right-side -->
