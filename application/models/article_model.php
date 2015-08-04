<?php if(! defined('BASEPATH'))     exit ('No access allowed');

/**
 * 文章管理模型
 */
class Article_model extends CI_Model {

    /**
     *  //查询表内的数据
     *  $res = $this->db->get('表名');
     *  $res->result();
     *  //添加数据
     *  $bool = $this->db->insert('表名',$data);
     *  //获取自增id
     *  $this->db->insert_id();
     *  //更新数据
     *  $bool = $this->db->update('表名',$data,array('id'=>3));
     *  //删除数据
     *  $bool = $this->db->detele('表名',array('id'=>2));
     *  //连贯操作
     *  $res = $this->db->select('id,name')
     *        ->from('表名')
     *        ->where('id>=',3)
     *        ->limit(2,3)
     *        ->order_by('id desc')
     *        ->get();
     *  $list = $res->result();
     *  //显示最近一条sql
     *  echo $this->db->last_query();
     *  ci里面limit的顺序是相反的
     *  
     *  $res = $this->db->where(array('name'=>'mary','id'=>2))->get('表名');
     *  //复杂查询
     *  $this->db->query($sql,$data);
     *
     */

    var $table = "article";

    //添加
    public function add($data){
        $this->db->insert($this->table,$data);
        return $data;
    }

    // 多条查询

    public function check(){
        $data = $this->db->get($this->table)->result_array();
        return $data;
    }

    // 单条查询

    public function get_one($id){
        $data = $this->db->where(array('id'=>$id))->get($this->table)->result_array();
        return $data;
    }

    //删除
    public function del($id){
        $data = $this->db->delete($this->table, array('id'=>$id));
        return $data;
    }

    //更新

    public function up($id,$data){ 
        $this->db->update($this->table, $data, array('id'=>$id));
        return $data;
    }

}


/**
 * 自定义打印函数
 */
function p ($arr) {

    echo "<pre>";

    print_r($arr);

    echo "</pre>";

}

/**
 * 成功跳转函数
 */

function success ($url, $msg) {
    header('Content-Type:text/html;charset=utf-8');
    $url = site_url($url);
    echo "<script type='text/javascript'>alert('$msg');location.href='$url'</script>";
    die;
}

/**
 * 失败返回函数
 */

function error ($msg) {
    header('Content-Type:text/html;charset=utf-8');
    echo "<script type='text/javascript'>alert('$msg');window.history.back();</script>";
    die;
}




