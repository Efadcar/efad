    <div class="wrapper"> 
        <?php $this->load->view('includes/header') ?>

        <?php $this->load->view('includes/menu') ?>

        <div class="content">

        <?php $this->load->view('includes/breadline') ?>

<div class="workplace">

                
                <div class="row-fluid">

                    <div class="span9">                    
                        <div class="row-fluid">
                            <div class="span2">
                                <div class="ucard clearfix">                                    
                                    <div class="right">
                                        <div class="image">
                                            <a href="#"><img src="<?php echo base_url().USERS_FILES.$profile->profile_img; ?>" class="img-polaroid"></a>                            
                                        </div>
                                        <ul class="control">                
                                            <li><span class="icon-pencil"></span> <a href="<?php echo site_url('users/users_edit/'.$row->user_uid); ?>">تعديل</a></li>
                                            
                                            <li><span class="icon-envelope"></span> <a href="messages.html">أرسال رسالة</a></li>
                                        </ul>                                                                                     
                                    </div>
                                </div>                                 
                            </div>                                                                                
                            <div class="span10">
                                <div class="block-fluid">

                                        <div class="info">                                                                
                                            <ul class="rows">
                                                <li class="head clearfix"><div class="isw-user"></div><font color="#FFFFFF" style="margin-right: 10px;font-size: 12px;text-shadow: 0 1px 0 #333;font-weight: bold;">البيانات الأساسية</font></li>
                                                <li>
                                                    <div class="title">الأسم بالكامل</div>
                                                    <div class="text"><?php echo $row->user_full_name ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">البريد الإلكترونى</div>
                                                    <div class="text"><?php echo $row->user_email ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">تاريخ أخر دخول</div>
                                                    <div class="text"><?php echo $row->user_last_login ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">تاريخ التسجيل</div>
                                                    <div class="text"><?php echo $row->user_add_date ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">أخر IP</div>
                                                    <div class="text"><?php echo $row->user_last_ip ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">حساب Facebook</div>
                                                    <div class="text"><a href="http://www.facebook.com/<?php echo $profile->profile_facebook ?>" target="_blank">أضغط هنا</a></div>
                                                </li>                                     
                                                <li>
                                                    <div class="title">حساب Twitter</div>
                                                    <div class="text"><a href="http://www.twitter.com/<?php echo $profile->profile_twitter ?>" target="_blank">أضغط هنا</a></div>
                                                </li>                                     
                                                <li>
                                                    <div class="title">حساب Google +</div>
                                                    <div class="text"><a href="http://plus.google.com/<?php echo $profile->profile_google ?>" target="_blank">أضغط هنا</a></div>
                                                </li>                                     
                                                <li>
                                                    <div class="title">نبذة عن العضو</div>
                                                    <div class="text"><?php echo $profile->profile_about ?></div>
                                                </li>                                     


                                            </ul>                                                      
                                        </div>                        
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <div class="span3">
                        <div class="block-fluid">

                                <div class="info">                                                                
                                    <ul class="rows">
                                        <li class="head clearfix"><div class="isw-user"></div><font color="#FFFFFF" style="margin-right: 10px;font-size: 12px;text-shadow: 0 1px 0 #333;font-weight: bold;">بيانات أخرى</font></li>
                                        <li>
                                            <div class="title">المجموعة</div>
                                            <div class="text"><span class="label label-inverse"><?php echo $row->group_uid ?></span></div>
                                        </li>
                                        <li>
                                            <div class="title">حالة الحساب</div>
                                            <div class="text"><span class="label <?php if( $row->user_actived){echo'label-success';}else{echo'label-important';} ?>"><?php if( $row->user_actived){echo'مفعل';}else{echo'موقوف';} ?></span></div>
                                        </li>
                                        <li>
                                            <div class="title">حالة الحظر</div>
                                            <div class="text"><span class="label <?php if( $row->user_banned){echo'label-important';}else{echo'label-success';} ?>"><?php if( $row->user_banned){echo'محظور';}else{echo'غير محظور';} ?></span></div>
                                        </li>
                                        <?php if( $row->user_banned){ ?>  
                                        <li>
                                            <div class="title">سبب الحظر</div>
                                            <div class="text"><?php echo $row->user_ban_reason ?></div>
                                        </li>
                                        <?php } ?>

                                    </ul>                                                      
                                </div>                        
                        </div>
                    </div>                 

                </div>            

                            



            </div>

        </div>   
    </div>
</body>
</html>


