<?php 
/*
 * 案例模型
 * Auth   : 逸风
 * Time   : 1460618642 
 * QQ     : 912524639
 * Email  : 912524639@qq.com
 * Site   : http://guanblog.sinaapp.com/
 */
 
namespace Admin\Model;
use Think\Model;

class ExampleModel extends Model{
	
    /*模型中定义的表*/
	protected $tableName = 'example'; 

    /* 自动验证规则 */
	protected $_validate = array(		array('title','require','请填写标题'),

 
	);

    /* 自动完成规则 */
	protected $_auto = array(
     
	);

}