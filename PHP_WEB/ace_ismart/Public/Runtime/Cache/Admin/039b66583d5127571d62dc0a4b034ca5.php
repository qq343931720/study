<?php if (!defined('THINK_PATH')) exit();?>

/*
 * <?php echo ($ModelInfo['title']); ?>控制器
 * Auth   : 逸风
 * Time   : <?php echo date("Y年m月d日",time());?> 
 * QQ     : 912524639
 * Email  : 912524639@qq.com
 * Site   : http://guanblog.sinaapp.com/
 */
 
namespace Admin\Controller;

class <?php echo ($ModelInfo['name']); ?>Controller extends AdminCoreController {
	
	//系统默认模型
	private $Model = null;

    protected function _initialize() {
		//继承初始化方法
		parent::_initialize ();
		//设置控制器默认模型
        $this->Model = D('<?php echo ($ModelInfo['name']); ?>');
    }
	
    /* 列表(默认首页)
     * Auth   : 逸风
     * Time   : <?php echo date("Y年m月d日",time());?> 
     **/
	public function index(){
		if(IS_POST){
        	//如果是post请求，查询并且返回数据
        	//设置搜索条件
			$map = array();
        	//根据搜索条件对模型数据进行搜索
			$_list = $this->Model->where($map)->order('sort asc')->getField('id<?php foreach ($_List as $key => $field_one ) {echo ','.$field_one['name'];}?>');
            //将搜索结果转为树型结构，然后赋值给data变量
			$data = list_to_tree($_list, 'id', 'pid','children');
            //以ajax的数据结构返回数据
			$this->ajaxReturn ( $data );
		}else{
        	//如果是get请求，显示页面模版
        	$this->display();
		}
	}
	
    /* 添加
     * Auth   : 逸风
     * Time   : <?php echo date("Y年m月d日",time());?> 
     **/
	public function add(){
		if(IS_POST){
        	//如果是post请求，进行数据添加操作
            //获取提交数据
			$post_data=I('post.');
<?php  foreach($_Add as $field_key=>$field){ if(in_array($field['type'],array('select','checkbox'))){ $extra=unserialize($field['extra']); if($extra['multiple']==1){ echo '
            //对表单类型为select和checkbox的字段，需要单独获取数据
            $post_data["'.$field["name"].'"]=I("post.'.$field["name"].'");'; echo '
            //将上一步的数据 转为以逗号链接的字符串
            $post_data["'.$field["name"].'"]=implode(",",$post_data["'.$field["name"].'"]);'; } } } ?> 
			//使用模型对数据进行自动完成和自动验证
			$data=$this->Model->create($post_data);
			if($data){
				//如果自动验证成功,进行下一步操作
                //向模型添加数据
				$result = $this->Model->add($data);
                //判断添加的结果
				if($result){
                	//添加成功
                    //通过行为执行操作，（如果数据库没有定义此行为不进行任何操作）
					action_log('Add_<?php echo ($ModelInfo['name']); ?>', '<?php echo ($ModelInfo['name']); ?>', $result);
                    //返回成功信息
					$this->success ( "操作成功！",U('index'));
				}else{
                	//添加失败
                    //向模型获取失败信息
					$error = $this->Model->getError();
                    //如果存在失败信息则返回失败信息，不存在则返回操作失败
					$this->error($error ? $error : "操作失败！");
				}
			}else{
				//向模型获取失败信息
                $error = $this->Model->getError();
                 //如果存在失败信息则返回失败信息，不存在则返回操作失败
                $this->error($error ? $error : "操作失败！");
			}
		}else{
        	//如果是get请求，显示页面模版
        	$this->display();
		}
	}
	
    /* 编辑
     * Auth   : 逸风
     * Time   : <?php echo date("Y年m月d日",time());?> 
     **/
	public function edit(){
		if(IS_POST){
        	//如果是post请求，进行数据添加操作
            //获取提交数据
			$post_data=I('post.');
<?php  foreach($_Add as $field_key=>$field){ if(in_array($field['type'],array('select','checkbox'))){ $extra=unserialize($field['extra']); if($extra['multiple']==1){ echo '
            //对表单类型为select和checkbox的字段，需要单独获取数据
            $post_data["'.$field["name"].'"]=I("post.'.$field["name"].'");'; echo '
            //将上一步的数据 转为以逗号链接的字符串
            $post_data["'.$field["name"].'"]=implode(",",$post_data["'.$field["name"].'"]);'; } } } ?> 
			//使用模型对数据进行自动完成和自动验证
			$data=$this->Model->create($post_data);
			if($data){
				//如果自动验证成功,进行下一步操作
                //根据$post_data中的ID数据，对模型中相应的数据进行更改
				$result = $this->Model->where(array('id'=>$post_data['id']))->save($data);
                //判断修改的结果
				if($result){
                	//修改成功
                    //通过行为执行操作，（如果数据库没有定义此行为不进行任何操作）
					action_log('Edit_<?php echo ($ModelInfo['name']); ?>', '<?php echo ($ModelInfo['name']); ?>', $post_data['id']);
                    //返回成功信息
					$this->success ( "操作成功！",U('index'));
				}else{
                	//修改失败
                    //向模型获取失败信息
					$error = $this->Model->getError();
                    //如果存在失败信息则返回失败信息，不存在则返回操作失败
					$this->error($error ? $error : "操作失败！");
				}
			}else{
				//向模型获取失败信息
                $error = $this->Model->getError();
                 //如果存在失败信息则返回失败信息，不存在则返回操作失败
                $this->error($error ? $error : "操作失败！");
			}
		}else{
        	//如果是get请求
            //获取get传递的参数
			$_info=I('get.');
            //根据get中的ID字段，查询默认模型中的对应数据，赋值给$_info变量
			$_info = $this->Model->where(array('id'=>$_info['id']))->find();
            //将$_info变量赋值给模版
			$this->assign('_info', $_info);
            //显示更改页面
        	$this->display();
		}
	}
	
    /* 删除
     * Auth   : 逸风
     * Time   : <?php echo date("Y年m月d日",time());?> 
     **/
	public function del(){
    	//获取get参数传递的ID字段
		$id=I('get.id');
        //判断ID如果小于1，说明传递参数错误
        if($id<1){
        	$this->error('参数不能为空！');
        }
        //通过主键值删除模型中的对应数据
		$res=$this->Model->delete($id);
        //判断删除结果
		if(!$res){
        	//失败 
			//向模型获取失败信息
			$error = $this->Model->getError();
			//如果存在失败信息则返回失败信息，不存在则返回操作失败
			$this->error($error ? $error : "操作失败！");
		}else{
        	//成功
        	//通过行为执行操作，（如果数据库没有定义此行为不进行任何操作）
			action_log('Del_<?php echo ($ModelInfo['name']); ?>', '<?php echo ($ModelInfo['name']); ?>', $id);
            //返回操作成功信息
			$this->success('删除成功！');
		}
	}
}