<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo C('SOFT_NAME');?>|ace管理系统</title>

        <!-- basic styles -->

        <link href="/Public/Static/aceAdmin/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css">
        <!--[if IE 7]>
          <link rel="stylesheet" href="/Public/Static/aceAdmin/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/jquery-ui-1.10.3.custom.min.css" />
        <!-- page specific plugin styles -->

        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/chosen.css" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/datepicker.css" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/daterangepicker.css" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/colorpicker.css" />
        <!-- ace styles -->

        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/ace.min.css" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/ace-skins.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/Public/Static/aceAdmin/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->

        <script src="/Public/Static/aceAdmin/js/ace-extra.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="/Public/Static/aceAdmin/js/html5shiv.js"></script>
        <script src="/Public/Static/aceAdmin/js/respond.min.js"></script>
        <![endif]-->

    <!-- ----------------------------------- -->
    <link href="/Public/Admin/images/favicon.ico" mce_href="/Public/Admin/images/favicon.ico" rel="bookmark" type="image/x-icon" /> 
    <link href="/Public/Admin/images/favicon.ico" mce_href="/Public/Admin/images/favicon.ico" rel="icon" type="image/x-icon" /> 
    <link href="/Public/Admin/images/favicon.ico" mce_href="/Public/Admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
    
    <link rel="stylesheet" type="text/css" href="/Public/Static/kindeditor/themes/default/default.css" />
    <!-- ----------------------------------- -->
        <link rel="stylesheet" type="text/css" href="/Public/Static/Easyui/themes/metro/easyui.css">
        <link rel="stylesheet" type="text/css" href="/Public/Static/Easyui/themes/color.css">
        <link rel="stylesheet" href="/Public/Static/aceAdmin/css/old/skin.css" />
    <!-- ----------------------------------- -->
    <script type="text/javascript" src="/Public/Static/Jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Static/Easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/Public/Static/Easyui/locale/easyui-lang-zh_CN.js"></script>
    <script charset="utf-8" src="/Public/Static/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="/Public/Static/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="/Public/Static/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="/Public/Static/Echarts/echarts.js"></script>
    <script charset="utf-8" src="/Public/Static/aceAdmin/js/old/base.js" /></script><script>
    var ke_pasteType=2;
    var ke_fileManagerJson="<?php echo U('Admin/FilesUpdata/filemanager');?>";
    var ke_uploadJson="<?php echo U('Admin/FilesUpdata/upload');?>";
    var ke_Uid='<?php echo session(C("AUTH_KEY"));;?>';
    var Root='';
    </script>
    <!-- ----------------------------------- -->
</head>
<body>

  <div class="fixed-bar" id="ModelField_Bar">
    <div class="item-title">.
      <div class="page-header">
        <h1><a href="<?php echo U('Admin/ModelField/index',array('model_id'=>I('get.model_id')));?>">字段管理</a>
          <small>
            <i class="icon-double-angle-right"></i>
            <span class="lead">&nbsp;&nbsp;新增</span>
          </small>
        </h1>
      </div>
    </div>
  </div>
  <div class="col-xs-12 marg-top">
    <form class="form-horizontal" role="form" method="POST" id="ModelField_Form">
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_name"> 字段名: </label>
        <div class="col-xs-11">
          <input name="name" id="for_name" value="" type="text" class="col-xs-9 col-sm-3" >
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_title"> 字段标题: </label>
        <div class="col-xs-11">
          <input name="title" id="for_title" value="" type="text" class="col-xs-9 col-sm-3">
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_type"> 数据类型:</label>
        <div class="col-xs-11">
          <select style="height:30px;" id="for_type" name="type" class="easyui-combobox col-xs-8 col-sm-3" data-options="value:'num',multiple:false,required:false,editable:false, onSelect:function(rec){field_setting(rec.value)}">
              <?php if(is_array(C("FIELD_LIST"))): $i = 0; $__LIST__ = C("FIELD_LIST");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <span class="middle"><strong style="color:#F00">&nbsp;&nbsp;&nbsp;修改数据类型后，字段参数会发生改变，请慎重！</strong>
            </span>
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_field"> 字段定义: </label>
        <div class="col-xs-11">
          <select style="height:30px;float:left;" id="for_field" name="field" class="col-xs-8 col-sm-3" data-options="multiple:false">
          </select>
          <span class="middle">
            &nbsp;&nbsp;如果没有你想要的字段定义，可以直接输入
          </span>
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right"> 字段属性: </label>
        <div class="col-xs-11">
          <div id="extra"></div>
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_value"> 字段默认值:</label>
        <div class="col-xs-11">
          <input name="value" style="height:30px;" id="for_value" value="" type="text" class="col-xs-9 col-sm-3">
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_remark"> 备注:</label>
        <div class="col-xs-11">
          <textarea name="remark" id="for_remark" class="col-xs-9 col-sm-3" style="height: 100px"></textarea>
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_sort_l">字段排序:</label>
        <div class="col-xs-11">
          列表
            <input class="" style="height:30px;width: 40px" type="text" name="sort_l" id="for_sort_l" value="<?php echo ($field_sort); ?>">
            搜索
            <input class="" style="height:30px;width: 40px" type="text" name="sort_s" value="<?php echo ($field_sort); ?>">
            新增
            <input class="" style="height:30px;width: 40px" type="text" name="sort_a" value="<?php echo ($field_sort); ?>">
            修改
            <input class="" style="height:30px;width: 40px" type="text" name="sort_e" value="<?php echo ($field_sort); ?>">
            <span class="middle">
              &nbsp;&nbsp;如果为0,即不显示
            </span>
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_l_width"> 字段默认值:</label>
        <div class="col-xs-11">
          <input name="l_width" style="height:30px;" id="for_l_width" value="100" type="text" class="col-xs-9 col-sm-3">
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_validate_rule">验证规则:</label>
        <div class="col-xs-11">
          <textarea name="validate_rule" id="for_validate_rule" class="col-xs-9 col-sm-3" style="height: 100px"></textarea>
          <a id="for_validate_rule_c" href="JavaScript:void(0);">&nbsp;&nbsp;帮助生成</a>
        </div>
      </div>
      <hr />
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_auto_rule">完成规则:</label>
        <div class="col-xs-11">
          <textarea name="auto_rule" id="for_auto_rule" class="col-xs-9 col-sm-3"  style="height: 100px"></textarea>
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="col-sm-1 control-label no-padding-right" for="for_status">状态:</label>
        <div class="col-xs-11">
          <select style="height:30px;" id="for_status" name="status" class="col-xs-7 col-sm-3">
              <option value="0" >禁用</option>
              <option value="1" selected>启用</option>
            </select>
        </div>
      </div>
      <hr/>
      <div class="clearfix">
        <div class="col-md-offset-1 col-md-9">
          <button class="btn btn-lg btn-success" type="button" onclick="$('#ModelField_Form').submit();">
            <i class="icon-ok bigger-110"></i>
            <span class="lead">提交</span>
          </button>
        </div>
      </div>
      <input type="hidden" name="model_id" value="<?php echo ($model_id); ?>" />
    </form>
  </div>
  <!-- /***************************************/ -->
  <script type="text/javascript">
function field_setting(fieldtype) {
    if (fieldtype == "") {
        return false;
    }
    $.getJSON("<?php echo U('Admin/Function/field_setting');?>&r_type=json",{fieldtype:fieldtype}, function (data) {
        $('#extra').html(data.extra);
		$.parser.parse('#extra');
    });
	$('#for_field').combobox({
		url: '<?php echo U("Admin/Function/get_field_default");?>&fieldtype=' + fieldtype,
		valueField: 'id',
		textField: 'text'
	});
}
$(document).ready(function(){
	field_setting('num');
		$('#for_validate_rule_box').window({
			width:700,
			height:500,
			modal:true
		}).window('close');
	$('#for_validate_rule_c').click(function(){
		$('#for_validate_rule_box').window('open');
	})
	$('#for_validate_rule_c_f').click(function(){
		$('#for_validate_rule_box').window('close');
		$('#for_validate_rule').textbox({
			value:$('#for_validate_rule').textbox('getText')+$('#result').val()+'\n'
		})
		
	})
})

/*自动验证生成规则*/

$(function(){
	fa="";fb="";fc="";fd="";fe="";ff="";
	ff="regex";
	$("#submit").click(function(){
		_str = "array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间),";
		fa = $("#fa").val();
		fc = $("#fc").val();
		_rule = "regex,unique";
		if(_rule.indexOf(ff) == -1) fb = $("#fbval").val();
		_str = _str.replace("验证字段","'"+fa+"'");
		_str = _str.replace("验证规则","'"+fb+"'");
		_str = _str.replace("错误提示","'"+fc+"'");
		if(fb == "require" || fb == "email" || fb == "url" || fb == "currency" || fb == "number"){
			_str = _str.replace(",验证条件,附加规则,验证时间","");
		}else{
			_str = _str.replace("验证条件",fd);
			_str = _str.replace("验证时间",fe);
			if(ff == "regex"){
				_str = _str.replace("附加规则","");
			}else{
				_str = _str.replace("附加规则","'"+ff+"'");
			}
		}
		$("#result").val(_str);

	});

	$("input[name='fd']").click(function(){
		fd = $(this).val();
	});

	$("input[name='fb']").click(function(){
		if($(this).attr("id") == "fb0"){
			fb = $("#fbval").val();
		}else{
			fb = $(this).val();
		}
	});

	$("input[name='fe']").click(function(){
		fe = $(this).val();
	});

	$("input[name='ff']").click(function(){
		if($(this).val() == "regex"){
			$(".fb1").show();
			$(".fb").hide();
		}

		if($(this).val() == "unique"){
			$(".fb").hide();
			$(".fb1").hide();
			fb = "";
		}

		if($(this).val() !== "regex" && $(this).val() !=="unique") {
			$(".fb").show();
			$(".fb1").hide();
			$("#fb0").prop("checked","checked");
			$("#fbval").focus();
		}
		$("#fbval").val("");
		if($(this).val() == "in" || $(this).val() == "notin") $("#fbval").val("array(1,2)");
		if($(this).val() == "between" || $(this).val() == "notbetween") $("#fbval").val("1,2 || array(1,2)");
		if($(this).val() == "expire") $("#fbval").val("2012-1-15,2013-1-15");
		if($(this).val() == "ip_allow" || $(this).val() == "ip_deny") $("#fbval").val("201.12.2.5,201.12.2.6");
		ff = $(this).val();
	});

});
</script>
  <div id="for_validate_rule_box" title="添加自动验证规则">
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr>
          <td class="required"><label>验证字段名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop"><input name="fa" style="height:30px;" id="fa" value="" type="text" class="easyui-textbox" data-options="required:false"></td>
        </tr>
        <tr>
          <td class="required"><label>验证规则:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop">
          <div class="fb" style="display:none"><label><input type="radio" name="fb" id="fb0"/></label><input type="text" id="fbval"/></div>
          <div class="fb1">
		<label><input type="radio" name="fb" id="fb1" value="require"/>require 字段必须</label>
		<label><input type="radio" name="fb" id="fb2" value="email"/>email 邮箱</label>
		<label><input type="radio" name="fb" id="fb3" value="url"/>url URL地址</label>
		<label><input type="radio" name="fb" id="fb4" value="currency"/>currency 货币</label>
		<label><input type="radio" name="fb" id="fb5" value="number"/>number 数字</label>
          </div></td>
        </tr>
        <tr>
          <td class="required"><label>提示信息:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop"><input name="fc" style="height:30px;" id="fc" value="" type="text" class="easyui-textbox" data-options="required:false"></td>
        </tr>
        <tr>
          <td class="required"><label>验证条件:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop">
		<label><input type="radio" name="fd" id="fd1" value="0"/>存在字段就验证</label>
		<label><input type="radio" name="fd" id="fd2" value="1"/>必须验证</label>
		<label><input type="radio" name="fd" id="fd3" value="2"/>值不为空的时候验证</label></td>
        </tr>
        <tr>
          <td class="required"><label>验证时间:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop">
		<label><input type="radio" name="fe" id="fe1" value="1"/>新增验证</label>
		<label><input type="radio" name="fe" id="fe2" value="2"/>编辑验证</label>
		<label><input type="radio" name="fe" id="fe3" value="3"/>全部验证</label></td>
        </tr>
        <tr>
          <td class="required"><label>生成规则:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop"><textarea name="result" id="result" cols="30" rows="3" style="width:100%"></textarea><br/>
          <input type="button" value="生成规则" class="btn btn-danger" id="submit"/>
          <input type="button" value="返回" class="btn btn-danger" id="for_validate_rule_c_f"/></td>
        </tr>
        <tr>
          <td class="required"><label>附加规则:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop">
		<label>
		<input type="radio" name="ff" id="ff1" value="regex" checked="checked"/>regex
		<p>正则验证，定义的验证规则是一个正则表达式（默认）</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff2" value="function"/>function
		<p>函数验证，定义的验证规则是一个函数名</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff3" value="callback"/>callback
		<p>方法验证，定义的验证规则是当前模型类的一个方法</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff4" value="confirm"/>confirm
		<p>验证表单中的两个字段是否相同，定义的验证规则是一个字段名</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff5" value="equal"/>equal
		<p>验证是否等于某个值，该值由前面的验证规则定义</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff6" value="notequal"/>notequal
		<p>验证是否不等于某个值，该值由前面的验证规则定义</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff7" value="in"/>in
		<p>验证是否在某个范围内，定义的验证规则可以是一个数组或者逗号分割的字符串</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff8" value="notin"/>notin
		<p>验证是否不在某个范围内，定义的验证规则可以是一个数组或者逗号分割的字符串</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff9" value="length"/>length
		<p>验证长度，定义的验证规则可以是一个数字（表示固定长度）或者数字范围（例如3,12 表示长度从3到12的范围）</p>
		</label><br />


		<label>
		<input type="radio" name="ff" id="ff10" value="between"/>between
		<p>验证范围，定义的验证规则表示范围，可以使用字符串或者数组，例如1,31或者array(1,31)</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff11" value="notbetween"/>notbetween
		<p>验证不在某个范围，定义的验证规则表示范围，可以使用字符串或者数组</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff12" value="expire"/>expire
		<p>验证是否在有效期，定义的验证规则表示时间范围，可以到时间，例如可以使用 2012-1-15,2013-1-15 表示当前提交有效期在2012-1-15到2013-1-15之间，也可以使用时间戳定义</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff13" value="ip_allow"/>ip_allow
		<p>验证IP是否允许，定义的验证规则表示允许的IP地址列表，用逗号分隔，例如201.12.2.5,201.12.2.6</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff14" value="ip_deny"/>ip_deny
		<p>验证IP是否禁止，定义的验证规则表示禁止的ip地址列表，用逗号分隔，例如201.12.2.5,201.12.2.6</p>
		</label><br />

		<label>
		<input type="radio" name="ff" id="ff15" value="unique"/>unique
		<p>验证是否唯一，系统会根据字段目前的值查询数据库来判断是否存在相同的值，当表单数据中包含主键字段时unique不可用于判断主键字段本身</p>
		</label><br /></td>
        </tr>
      </tbody>
    </table>
  </div>

<!-- basic scripts -->

        <!-- <![endif]-->

        <!--[if IE]>
        <script src="/Public/Static/aceAdmin/js/jquery-2.0.3.min.js"></script>
        <![endif]-->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='/Public/Static/aceAdmin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
            <script type="text/javascript">
             window.jQuery || document.write("<script src='/Public/Static/aceAdmin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
            </script>
        <![endif]-->

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='/Public/Static/aceAdmin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="/Public/Static/aceAdmin/js/bootstrap.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->

        <script src="/Public/Static/aceAdmin/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/jquery.ui.touch-punch.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/markdown/markdown.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/markdown/bootstrap-markdown.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/jquery.hotkeys.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/bootstrap-wysiwyg.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/bootbox.min.js"></script>

        <!-- ace scripts -->

        <script src="/Public/Static/aceAdmin/js/ace-elements.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/ace.min.js"></script>
        <script src="/Public/Static/aceAdmin/js/editor.js"></script>
</body>
</html>