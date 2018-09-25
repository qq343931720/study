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
    
    <link rel="stylesheet" type="text/css" href="/Public/Static/kindeditor/themes/default/default.css" />
    <!-- easyUI css样式 -->
    <link rel="stylesheet" type="text/css" href="/Public/Static/Easyui/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="/Public/Static/Easyui/themes/color.css">
    <link rel="stylesheet" href="/Public/Static/aceAdmin/css/old/skin.css" />
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

  <div class="fixed-bar" id="Config_Bar">
    <div class="item-title">
      <div class="page-header">
        <h1>配置模型&nbsp;&nbsp;
          <small>
            <i class="icon-double-angle-right"></i>
            <span class="lead">&nbsp;&nbsp;列表</span>
            <a class="top_a" href="JavaScript:void(0);" onclick="Data_Search('Config_Search_From','Config_Data_List');"><span>搜索</span></a>
            <?php if(Is_Auth('Admin/Config/add')): ?><a class="top_a" href="<?php echo U('Admin/Config/add');?>"><span>新增</span></a><?php endif; ?>
          </small>
        </h1>
      </div>
    </div>
  </div>
  <div style="display: none">
    <style type="text/css" media="screen">
      th{
        width: 20%;
        padding-left:2%;
      }
    </style>
    <form id="Config_Search_From" class="search_from" style="width:auto;height:auto">
      <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tr>
          <th>配置名称: </th>
          <td><input name="s_name" type="text" class="easyui-textbox" style="height:30px;width:60%;"></td>
        </tr>
        <tr>
          <th>配置类型: </th>
          <td><select name="s_type" class="easyui-combobox" style="height:30px;width:60%;" data-options="value:'',url:'<?php echo U("Admin/Function/get_config");?>&cname=CONFIG_TYPE_LIST|type|title&r_type=json',valueField:'type',textField:'title',multiple:false,required:false,editable:false">
            </select></td>
        </tr>
        <tr>
          <th>配置说明: </th>
          <td><input name="s_title" type="text" class="easyui-textbox" style="height:30px;width:60%;"></td>
        </tr>
        <tr>
          <th>配置分组: </th>
          <td><select name="s_group" class="easyui-combobox" style="height:30px;width:60%;" data-options="value:'',url:'<?php echo U("Admin/Function/get_config");?>&cname=CONFIG_GROUP_LIST|group|title&r_type=json',valueField:'group',textField:'title',multiple:false,required:false,editable:false">
            </select></td>
        </tr>
        <tr>
          <th>状态: </th>
          <td><select name="s_status" class="easyui-combobox" style="height:30px;width:60%;" data-options="value:'',multiple:false,required:false,editable:false">
              <option value="" >请选择一个选项</option>
              <option value="1" >启用</option>
              <option value="0" >禁用</option>
            </select></td>
        </tr>
        <tr>
          <th>排序: </th>
          <td><input name="s_sort" type="text" class="easyui-numberbox" style="height:30px;width:60%;" data-options="precision:'0',decimalSeparator:'.',groupSeparator:',',required:false"></td>
        </tr>
      </table>
    </form>
  </div>
  <table id="Config_Data_List">
  </table>
  <script type="text/javascript">
$(function() {
	$("#Config_Data_List").datagrid({
		url : "<?php echo U('Config/index');?>",
		fit : true,
		striped : true,
		border : false,
		pagination : true,
		pageSize : 20,
		pageList : [ 10, 20, 50 ],
		pageNumber : 1,
		sortName : 'id',
		sortOrder : 'desc',
		toolbar : '#Config_Bar',
		singleSelect : true,
		columns : [[
            {field : 'id',title : 'ID',width : 40,sortable:true},
{field : "name",title : "配置名称",width :100,sortable:true},{field : "title",title : "配置说明",width :100,sortable:true},{field : "remark",title : "配置说明",width :100,sortable:true},{field : "create_time",title : "创建时间",width :100,sortable:true,formatter: function (value, row, index) {
			return u_to_ymdhis(value)
		}},{field : "status",title : "状态",width :100,sortable:true,formatter: function (value, row, index) {
			var op_status=new Array()
			op_status["1"]="启用"
			op_status["0"]="禁用"
			
			return op_status[value];
			}},
			{field : "sort",title : "排序",width :100,sortable:true},
			{field : "operate",title : "操作",width : 200,formatter: function (value, row, index) {
				operate_menu='';
				
				<?php if(Is_Auth('Admin/Config/edit')): ?>operate_menu = operate_menu+"<a href='<?php echo U('edit'); ?>&id="+row.id+"' >编辑</a>";<?php endif; ?>

				<?php if(Is_Auth('Admin/Config/del')): ?>operate_menu = operate_menu+" | <a href='#' onclick=Data_Remove('<?php echo U('del'); ?>&id="+row.id+"','Config_Data_List')>删除</a>";<?php endif; ?>

				return operate_menu;
			}}
		]]
	});
})
</script>
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