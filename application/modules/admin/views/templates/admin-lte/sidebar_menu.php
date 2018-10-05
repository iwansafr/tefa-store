<?php $user_data = $this->session->userdata(base_url().'_logged_in');?>
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
    	<?php
			if(!empty($user_data['image']))
			{
				?>
				<img src="<?php echo image_module('user', $user_data['id'].'/'.$user_data['image']) ?>" class="img-circle">
				<?php
			}else{
				?>
				<i class="fa fa-user"></i> <span class="hidden-xs"><?php echo $this->session->userdata[base_url().'_logged_in']['username'] ?> </span>
				<?php
			}
			?>
    </div>
    <div class="pull-left info">
      <p><?php echo $user_data['username'] ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="<?php echo base_url('admin/search_list');?>" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="keyword" class="form-control" id="any_search" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <?php
    foreach ($menu as $key => $value)
    {
      if(!empty($value['list']))
      {
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa <?php echo $value['icon'] ?>"></i> <span><?php echo $value['title'] ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            foreach ($value['list'] as $vkey => $vvalue)
            {
              ?>
              <li><a href="<?php echo $vvalue['link'] ?>"><i class="fa <?php echo $vvalue['icon'] ?>"></i> <?php echo $vvalue['title'] ?></a></li>
              <?php
            }?>
          </ul>
        </li>
        <?php
      }else{
        ?>
        <li class="treeview">
          <a href="<?php echo $value['link'] ?>">
            <i class="fa <?php echo $value['icon'] ?>"></i> <span><?php echo $value['title'] ?></span>
          </a>
        </li>
        <?php
      }
    }
    ?>
  </ul>
</section>