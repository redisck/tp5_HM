@extends('pcenter.public.index')
@section('content')
<div class="AreaR">
    <div class="box">
      <div class="box_1">
        <div class="userCenterBox boxCenterList clearFix">  
        <script type="text/javascript" src="/webc/common/js/jquery-1.8.3.min.js"></script>
          
<script type="text/javascript">
    function fun(b){
      for(var i=1;i<=4;i++){
        dd=document.getElementById('con_tab_'+i);
        menu=document.getElementById('tab'+i);  
        dd.style.display=(b==i)?"block":"none";
        menu.className=(b==i)?"xxk":"none";
      }
    }
</script>
          <div class="tabmenu zkuser_gerenziliao">
            <ul class="tab pngFix">
              <li onclick="fun(1)" id="tab1" style="margin-left:70px" class="xxk">基本信息</li>
              <li onclick="fun(2)" id="tab2" style="margin-left:70px" class="">修改密码</li>
              <li onclick="fun(3)" id="tab3" style="margin-left:70px" class="">修改邮箱</li>
              <li onclick="fun(4)" id="tab4" style="margin-left:70px" class="">设置密保</li>
            </ul>
          </div>
          <div class="ncm-user-profile">
            <div id="con_tab_1" class="ncm-default-form" style="display:block;">
              <form  method="post" onsubmit="return " action="/web/pcenter/edit">
                <table width="100%"  cellspacing="1" cellpadding="10" border="0" bgcolor="#E6E6E6">
                <tbody >
                <tr style="line-height:10px;">
                  <td width="38%" bgcolor="#FFFFFF" align="right">用户名称：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                    <input type="text" disabled value="{{$info->username}}" class="inputBg" size="25" name="username">
                    </td>
                </tr> 
                  <div style="height:20px; display:block;"></div>
                 <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">昵称：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                  <input type="text" value="{{$info->name}}" class="inputBg" size="25" name="name">
                    </td>
                </tr>


                 <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">地址：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                  <input type="text" value="{{$info->address}}" class="inputBg" size="25" name="address">
                    </td>
                </tr>


                 <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">邮箱：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                  <input type="text" value="{{$info->email}}" disabled class="inputBg" size="25" name="email">
                    </td>
                </tr>
                <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">性别：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                      <input type="radio" value="1" name="sex" @if($info->sex==1)checked @endif>
                      男&nbsp;&nbsp; </label>
                    <label>
                      <input type="radio" name="sex"  value="2" @if($info->sex==2)checked @endif>
                      女 </label></td>
                </tr>
                <input type="hidden" value="{{$info->id}}" name="uid">
             <tr>
                <td bgcolor="#FFFFFF" align="center" colspan="2">
                  <label class="submit-border">
                      {{csrf_field()}}
                      <button class="bnt_blue_1">确认修改</button>
                  </label>
                </td>
                </tr>
              </tbody>
              </table>
            </form>
            </div>
        <div style="display: none;" id="con_tab_2" class="ncm-default-form">
              <form enctype="multipart/form-data" method="post" action="/web/pcenter/doeditpass">
               <table width="100%"  cellspacing="1" cellpadding="10" border="0" bgcolor="#E6E6E6">
                 <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">旧密码:</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                    <input type="password" class="inputBg" size="25" name="oldpasswd">
                    </td>
                </tr>
                <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">新密码：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                  <input type="password" value="" class="inputBg" size="25" name="passwd">
                    </td>
                </tr>
                <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">重新输入：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                  <input type="password" value="" class="inputBg" size="25" name="npasswd">
                    </td>
                </tr>
                  <tr>
                <td bgcolor="#FFFFFF" align="center" colspan="2">
                  <label class="submit-border">
                      {{csrf_field()}}
                      <button type="submit" class="bnt_blue_1"  name="repass">确认修改</button>
                  </label>
                </td>
                </tr>
                </table>
              </form>
            </div>
           <div id="con_tab_3" class="ncm-default-form" style="display:none;">
              <form method="post" action="" name="formEdit">
                <table width="100%" cellspacing="1" cellpadding="10" border="0" bgcolor="#E6E6E6">
                <tbody>
                 <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">修改邮箱：</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                  <input type="text" class="inputBg" size="25" name="upemail">
                    </td>
                </tr>
                <tr>
                  <td width="38%" bgcolor="#FFFFFF" align="right">验证码:</td>
                  <td width="72%" bgcolor="#FFFFFF" align="left">
                  <input type="text" class="inputBg" name="yzm" style="width:142px" >

                  <input type="button" name="hq" class="bnt_blue_1" value="获取"/>
                    </td>
                </tr>
             <tr>
                <td bgcolor="#FFFFFF" width="300px" align="center" colspan="2">
                  <label class="submit-border">
                      <input type="hidden" value="act_edit_profile" name="act">
                      {{csrf_field()}}
                      <input type="button" value="提交" class="bnt_blue_1" name="tijiao">
                  </label>
                </td>
                </tr>
              </tbody>
              </table>
            </form>
          </div>
          <div id="con_tab_4" class="ncm-default-form" style="display:none;">
                      <form method="post" action="/web/pcenter/quest" name="formEdit">
                        <table width="100%" cellspacing="1" cellpadding="10" border="0" bgcolor="#E6E6E6">
                        <tbody>
                        <tr>
                          <td width="38%" bgcolor="#FFFFFF" align="right">密保设置：</td>
                          <td width="72%" bgcolor="#FFFFFF" align="left">
                            <select name="quest" id="" class="inputBg" >
                                <option value="" disabled>--请选择--</option>
                                <option value="1">你是猪吗?</option>
                                <option value="2">你是谁?</option>
                                <option value="3">啦啦啦!</option>
                            </select>
                        </tr>
                        <tr>
                          <td width="38%" bgcolor="#FFFFFF" align="right">输入答案：</td>
                          <td width="72%" bgcolor="#FFFFFF" align="left">
                          <input type="text" class="inputBg" size="25" name="anserkey">
                            </td>
                        </tr>
                        <td bgcolor="#FFFFFF" width="300px" align="center" colspan="2">
                          <label class="submit-border">
                              {{csrf_field()}}
                              <input type="submit" value="提交" class="bnt_blue_1">
                          </label>
                        </td>
                        </tr>
                      </tbody>
                      </table>
                    </form>
                  </div>           
  
          </div>
        </div>
      </div>
       
    </div>
  </div>

   <script type="text/javascript">
                    //文件入口
                  
                           $("input[name='name']").focus(function(){
                                $(this).next('span').remove();
                                $("<span>请输入中文字母数字或下划线</span>").css('color','red').insertAfter($(this));
                            }).blur(function(){
                                ss=$(this);
                                ss.next('span').remove();
                                v=ss.val();

                                 if(v==""){
                                           $("<span>✘不能为空</span>").css('color','red').insertAfter(ss);
                                           flag=false;
                                    }else{
                                          $.get("/web/pcenter/checkname",{uname:v},

                                            function(data){
                                             
                                                if(data==1){
                                                  $("<span>✘昵称已存在</span>").css('color','red').insertAfter(ss);
                                                  flag=false;

                                              }else{
                                                  $("<span>✔可修改</span>").css('color','green').insertAfter(ss);
                                                  flag=true;

                                              }
                                           
                                           });
                                       }
                                  });

            $("input[name='address']").focus(function(){

                $(this).next('span').remove();
                $("<span>请正确输入</span>").css('color','red').insertAfter($("input[name='address']"));
               
            }).blur(function(){

                // alert('1111');
                adr=$(this).val();
                $(this).next('span').remove();
                if(adr==""){
                   $("<span>✘地址不能为空</span>").css('color','red').insertAfter($("input[name='address']"));
                   adr=false;
                }else{
                   $("<span>✔可修改</span>").css('color','green').insertAfter($("input[name='address']"));
                   adr=true;
                }
               
            });
            
                        
           $("form:first").submit(function(){
              if(!flag || !adr){
                  return false;
              }

           })         
                  
//邮箱验证
          $("input[name='upemail']").focus(function(){
                                        $(this).next('span').remove();
                                        $("<span>请输入邮箱</span>").css('color','red').insertAfter($(this));

                                        
                                      }).blur(function(){
                                          ee=$(this);
                                          ee.next('span').remove();
                                          e=ee.val();
                                        if(e==""){
                                           $("<span>✘不能为空</span>").css('color','red').insertAfter(ee);
                                            fmail=false;
                                         }else{
                                             if(e.match(/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+\.com$/)==null){
                                                 $("<span>邮箱地址不符合</span>").css('color','red').insertAfter(ee);
                                                    //阻止提交
                                                    fmail=false;

                                                 }else{
                                                    $.get("/web/pcenter/checkmail",{umail:e},function(data){
                                                       
                                                          if(data==1){
                                                            $("<span>✘邮箱已存在</span>").css('color','red').insertAfter(ee);
                                                            fmail=false;

                                                        }else{
                                                            $("<span>✔可修改</span>").css('color','green').insertAfter(ee);
                                                            fmail=true;
                                                        }
                                                     });
                                                 }
                                           }

                                      });
                 
                               
           $("input[name='hq']").click(function(){
               if(fmail){
                 //    //获取邮箱
                    email=$("input[name='upemail']").val();
                    $.get("/web/pcenter/editmail",{useremail:email},function(data){
                            num=data;
                            alert("邮件发送中...");
                    });  

                 }else{
                  alert('填写的地址不对');
                 }
             });
          
         $("input[name='tijiao']").click(function(){
               if(fmail){
                //获取输入验证码
                yzm=$("input[name='yzm']").val();

                if(yzm==num){

                 $.get("/web/pcenter/docheck",{email:email},function(data){
                        if(data==1){
                              alert('修改成功');
                            }else{
                              alert('修改失败');
                            }
                    }); 

              }else{
                alert('验证码错误或过期');
              } 
            }
          });
         
//密码修改
      $("input[name='oldpasswd']").focus(function(){
                                        $(this).next('span').remove();
                                        $("<span>请输入旧密码</span>").css('color','red').insertAfter($(this));                                       
                                      }).blur(function(){
                                          pp=$(this);
                                          pp.next('span').remove();
                                          p=pp.val();

                                        $.get("/web/pcenter/checkpass",{oldpasswd:p},function(data){
                                              
                                              if(data=="1"){
                                               
                                                $("<span>✔可修改</span>").css('color','green').insertAfter(pp);
                                                  $("button[name='repass']").attr('disabled',false); 

                                            }else{
                                                 $("<span>✘密码错误</span>").css('color','red').insertAfter(pp);
                                                 $("button[name='repass']").attr('disabled',true);
                                            }
                                         });
                                })                 
 </script> 
@endsection