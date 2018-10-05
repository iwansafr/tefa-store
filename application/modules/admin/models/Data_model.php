<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

  var $view            = '';
  var $where           = '';
  var $url             = '';
  var $orderby         = 'ORDER BY id DESC';
  var $jointable       = array();
  var $statement       = false;
  var $statement_value = array();

  public function setStatement($set = true)
  {
    if(!empty($set))
    {
      $this->statement = $set;
    }
  }

  public function setStatementValue($value = array())
  {
    if(!empty($value) && is_array($value))
    {
      $this->statement_value = $value;
    }
  }

  public function setView($text ='')
  {
    $this->view = $text;
  }

  public function setWhere($sql = '')
  {
    if(!empty($sql))
    {
      $this->where = $sql;
    }
  }

  public function setUrl($url = '')
  {
    if(!empty($url))
    {
      $this->url = $url;
    }
  }

  public function orderBy($field = 'id', $sort = 'DESC')
  {
    if(!empty($field) && !empty($sort))
    {
      $this->orderby = " ORDER BY `{$field}` {$sort} ";
      if(!empty($this->jointable))
      {
        $this->orderby = ' ORDER BY '.$this->jointable['table'].'.'.$field.' '.$sort;
      }
    }
  }

  public function get_all($sql = '')
  {
    if(!empty($sql))
    {
      return $this->db->query($sql)->result_array();
    }
  }

  public function join($table = '', $cond = '',$field = '')
  {
    if(!empty($table) && !empty($cond) && !empty($field))
    {
      $this->jointable['table']     = $table;
      $this->jointable['condition'] = $cond;
      $this->jointable['field']     = $field;
    }
  }

	public function get_data_list($table = '', $field = array(), $input = array(), $limit = 0,$page = 0, $keyword = NULL)
	{
    $data    = array();
    $url_get = base_url('admin/'.$table.'_list').'';
    $id = 0;
    if(!empty($this->view))
    {
      $url_get = base_url($this->view);
    }
    $add_sql = '';
    if(!empty($input) && is_array($input))
    {
      $input = '`'.implode('`,`',$input).'`';
    }else{
      $input = '*';
    }

    if(!empty($_GET))
    {
      if(!empty($_GET['keyword']))
      {
        $keyword = $this->db->escape_str($_GET['keyword']);
        $url_get = base_url('admin/'.$table.'_list').'?keyword='.$keyword;
        if(!empty($this->view))
        {
          $url_get = base_url($this->view).'?keyword='.$keyword;
        }
      }
      if(!empty($_GET['page']))
      {
        $page = @intval($_GET['page']);
      }

      if(!empty($_GET['id']))
      {
        $id = $_GET['id'];
      }
    }

    if(!empty($field) && is_array($field))
    {
      $i = 0;
      foreach ($field as $fkey => $fvalue)
      {
        $col = $i == 0 ? '(' :'';

        $add_sql .= " OR {$col} {$fvalue} LIKE '%{$keyword}%'";
        $i++;
      }
      $add_sql .= ')';
    }

    if($page>0)
    {
      $page = $page-1;
    }

    $page = @intval($page)*$limit;
    $this->db->limit($limit,$page);

    $sql = '';
    if($keyword != NULL)
    {
      $sql = " WHERE `id` = ".@intval($keyword)." {$add_sql}";
    }

    if(!empty($this->where))
    {
      if(!empty($sql))
      {
        $sql = $sql.' AND '.$this->where;
      }else{
        $sql = ' WHERE '.$this->where;
      }
    }

    if(!empty($this->jointable))
    {
      $this->orderby = ' ORDER BY '.$this->jointable['table'].'.id DESC ';
    }

    if(!empty($this->jointable))
    {
      $jointable = $this->jointable['table'];
      $condition = $this->jointable['condition'];
      $joinfield = $this->jointable['field'];
      $query     = $this->db->query("SELECT {$joinfield} FROM `{$table}` LEFT JOIN {$jointable} {$condition} $sql {$this->orderby} LIMIT {$page},{$limit}");
    }else{
      $query = $this->db->query("SELECT {$input} FROM `{$table}` $sql {$this->orderby} LIMIT {$page},{$limit}");
    }

    $data['query'] = $this->db->last_query();
		$data['data']  = $query->result_array();
    if($keyword==NULL && empty($id))
    {
      if(!empty($this->where))
      {
        $where = $this->where;
        $total_rows = $this->db->query("SELECT `id` FROM `{$table}`  WHERE $where")->num_rows();
      }else{
        $total_rows = $this->db->count_all($table);
      }
    }else{
      $query = $this->db->query("SELECT `id` FROM `{$table}`  WHERE `id` = '{$keyword}' {$add_sql}");
      $total_rows = $query->num_rows();
      if(!empty($this->where))
      {
        if(!empty($sql))
        {
          $sql = $sql.' AND '.$this->where;
        }else{
          $sql = ' WHERE '.$this->where;
        }
        $query = $this->db->query("SELECT `id` FROM `{$table}`  {$sql}");
        $total_rows = $query->num_rows();
      }
    }
    $config = pagination($total_rows,$limit,$url_get);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
		return $data;
	}

  private function split($data = '')
  {
    if(!empty($data))
    {
      $data   = explode(' ', $data);
      $field  = 'WHERE ';
      $fvalue = array();

      foreach ($data as $key => $value)
      {
        if($value == '=')
        {
          $field .= @$data[$key-1].' = ? ';
          $fvalue[] = @$data[$key+1];
          unset($data[$key+1]);
        }else if($value == '>')
        {
          $field .= @$data[$key-1].' > ? ';
          $fvalue[] = @$data[$key+1];
          unset($data[$key+1]);
        }
        else if($value == '<')
        {
          $field .= @$data[$key-1].' < ? ';
          $fvalue[] = @$data[$key+1];
          unset($data[$key+1]);
        }else if($value == 'LIKE')
        {
          $field .= @$data[$key-1].' LIKE ? ';
          $data[$key+1] = str_replace("'", '', $data[$key+1]);
          $fvalue[] = @$data[$key+1];
          unset($data[$key+1]);
        }else if($value == 'AND')
        {
          $field .= @$data[$key-1].' AND ';
        }else if($value == 'OR')
        {
          $field .= @$data[$key-1].' OR ';
        }
      }
    }
    $data          = array();
    $data['sql']   = $field;
    $data['value'] = $fvalue;
    return $data;
  }

  public function get_data($table = '', $where = '')
  {
    if(!empty($table))
    {
      $sql   = "SELECT * FROM `{$table}` {$where}";
      $binds = false;
      if(!empty($this->statement) && !empty($this->statement_value))
      {
        $binds = $this->statement_value;
      }
      $data = $this->db->query($sql,$binds)->result_array();
      return $data;
    }
  }

  public function get_one($table = '', $field = '', $where = '')
  {
    if(!empty($table))
    {
      $sql   = "SELECT {$field} FROM `{$table}` {$where} LIMIT 1";
      $binds = false;
      if(!empty($this->statement) && !empty($this->statement_value))
      {
        $binds = $this->statement_value;
      }
      $data = $this->db->query($sql,$binds)->row_array();

      return $data[$field];
    }
  }

  public function get_one_data($table = '', $where = '')
  {
    if(!empty($table))
    {
      $sql   = "SELECT * FROM `{$table}` {$where} LIMIT 1";
      $binds = false;
      if(!empty($this->statement) && !empty($this->statement_value))
      {
        $binds = $this->statement_value;
      }
      $data = $this->db->query($sql,$binds)->row_array();
      return $data;
    }
  }

  public function LAST_INSERT_ID()
  {
    $query   = $this->db->query('SELECT LAST_INSERT_ID() AS id');
    $data    = $query->row_array();
    $last_id = !empty($data) ? $data['id'] : 0;
    return $last_id;
  }

  public function set_param($table = '',$name = '', $post = array())
  {
    if(!empty($table))
    {
      $data = array();
      foreach ($post as $key => $value)
      {
        $data[$key] = $value;
      }
      if($this->get_one_data($table, "WHERE name = '{$name}'"))
      {
        return $this->db->update($table, $data, "`name` = '{$name}'");
      }else{
        return $this->db->insert($table, $data);
      }
    }
  }

  public function set_data($table = '',$id = 0, $post = array())
  {
    if(!empty($table))
    {
      $data = array();
      foreach ($post as $key => $value)
      {
        $data[$key] = $value;
      }
      if($id > 0)
      {
        return $this->db->update($table, $data, 'id = '.$id);
      }else{
        return $this->db->insert($table, $data);
      }
    }
  }

  public function del_data($table='',$ids = array())
  {
    if(!empty($ids)&&!empty($table))
    {
      foreach ($ids as $key => $id)
      {
        $this->db->delete($table, array('id'=>$id));
        $dir = FCPATH.'images/modules/'.$table.'/'.$id.'/';
        recursive_rmdir($dir);
        $dir = FCPATH.'images/modules/'.$table.'/gallery'.'/'.$id.'/';
        recursive_rmdir($dir);
      }
    }
  }
}