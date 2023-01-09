<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * sidebar.php 边栏菜单文件
 * @version 1.0
**/
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!--Sidebar Start-->
<div class="mdui-drawer mdui-drawer-close blur" id="mainsidebar">

<div class="mdui-grid-tile">

  <img src="<?php $this->options->AKAROMsidebarimg(); ?>">
  <img onclick="window.location.href='<?php $this->options ->siteUrl('/admin'); ?>'" src="<?php $this->options->AKAROMlogoUrl(); ?>" style="position: absolute; top: 15%; left: 24px; width: 60px; height: 60px; border: 2px solid rgb(255, 255, 255); border-radius: 50%;">
  <div class="mdui-grid-tile-actions">
    <h3 class="easysee chameleon">
    <?php $this->options->title(); ?>
</h3>
<br>
<br>
  </div>
</div>

<div class="mdui-container">
  <div class="mdui-list yuan" mdui-collapse="{accordion: true}">
        <div class="mdui-list">
          <a href="<?php $this->options ->siteUrl(); ?>" class="yuan mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">store</i>
            <div class="mdui-list-item-content">主页</div>
          </a>
          </div>

          <div class="mdui-collapse-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple yuan">
           <i class="mdui-list-item-icon mdui-icon material-icons">book</i>
           <div class="mdui-list-item-content">分类</div>
            <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
          </div>
          <div class="mdui-collapse-item-body">
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
            <?php while ($category->next()): ?>
                <a class="yuan mdui-list-item mdui-ripple">
                  <div class="mdui-list-item-content"><?php $category->name(); ?></div>
                   <b><?php $category->count(); ?></b>
                </a>
            <?php endwhile; ?>
          <div class="mdui-typo"><hr></div>
         </div>	
        
        <div class="mdui-list">

        <a href="<?php $this->options ->index(); ?>archivesbox.html" class="yuan mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons">inbox</i>
          <div class="mdui-list-item-content">文章归档</div>
          </a>

        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
          <a href="<?php $pages->permalink(); ?>" class="yuan mdui-list-item mdui-ripple">
          <i class="mdui-list-item-icon mdui-icon material-icons">check_box_outline_blank</i>
          <div class="mdui-list-item-content"><?php $pages->title(); ?></div>
          </a>
          <?php endwhile; ?>
        </div>

        
      </div>
    </div>
  
</div>
</div><!--Sidebar End-->
