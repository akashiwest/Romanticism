<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * sidebar.php 边栏菜单文件
 * @version 2.0
**/
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!--Sidebar Start-->
<div class="mdui-drawer mdui-drawer-close blur" id="mainsidebar">

<div class="mdui-grid-tile sidebarimg" style="background-image: url('<?php if(empty($this->options->AKAROMsidebarimg)): ?><?php $this->options->themeUrl('config/style/img/default/sidebar.png'); ?><?php else: ?><?php $this->options->AKAROMsidebarimg(); ?><?php endif; ?>');">
  <img class="headicon" onclick="window.location.href='<?php $this->options ->siteUrl('/admin'); ?>'" title="headicon" src="<?php if(empty($this->options->AKAROMlogoUrl)): ?><?php $this->options->themeUrl('config/style/img/default/user.jpg'); ?><?php else: ?><?php $this->options->AKAROMlogoUrl(); ?><?php endif; ?>">
  <div class="mdui-grid-tile-actions">
    <h3 class="easysee chameleon mdui-text-truncate" mdui-tooltip="{content: '<?php $this->options->title(); ?>'}">
    <?php $this->options->title(); ?>
</h3>
<br>
<br>
  </div>
</div>

<div class="mdui-container">
  <div class="mdui-list yuan" mdui-collapse="{accordion: true}">
        <div class="mdui-list">
          <a href="<?php $this->options ->siteUrl(); ?>" class="btnyuan mdui-list-item ">
            <i class="mdui-list-item-icon mdui-icon material-icons">store</i>
            <div class="mdui-list-item-content">主页</div>
          </a>
          </div>

          <div class="mdui-collapse-item">
          <div class="mdui-collapse-item-header mdui-list-item  btnyuan">
           <i class="mdui-list-item-icon mdui-icon material-icons">book</i>
           <div class="mdui-list-item-content">分类</div>
            <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
          </div>
          <div class="mdui-collapse-item-body">
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
            <?php while ($category->next()): ?>
                <a href="<?php $category->permalink(); ?>" class="btnyuan mdui-list-item">
                  <div class="mdui-list-item-content mdui-text-truncate"><?php $category->name(); ?></div>
                   <b><?php $category->count(); ?></b>
                </a>
            <?php endwhile; ?>
          <div class="mdui-typo"><hr></div>
         </div>	
        
        <div class="mdui-list">

        <a href="<?php $this->options ->index(); ?>archivesbox.html" class="btnyuan mdui-list-item ">
        <i class="mdui-list-item-icon mdui-icon material-icons">inbox</i>
          <div class="mdui-list-item-content">文章归档</div>
          </a>

        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
          <a href="<?php $pages->permalink(); ?>" class="btnyuan mdui-list-item ">
          <i class="mdui-list-item-icon mdui-icon material-icons">check_box_outline_blank</i>
          <div class="mdui-list-item-content mdui-text-truncate"><?php $pages->title(); ?></div>
          </a>
          <?php endwhile; ?>
        </div>

        
      </div>
    </div>
  
</div>
</div><!--Sidebar End-->
