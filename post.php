<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|
                                       
 * Post
 * 文章内容输出
 * @author 明石
 * @version 1.0
 * @link https://blog.imakashi.top/
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('config/header.php'); ?>

<div class="mdui-shadow-0 mdui-ripple articlecard mdui-card articleimg mdui-valign show" style="background-image: url('<?php $this->fields->AKAROMarticleimg(); ?>');background-color: <?php $this->fields->AKAROMarticlecolor(); ?>;">
  <div class="mdui-card-media-covered articlecard mdui-text-center ">
      <div class="mdui-card-primary easysee">
	  <br><br><br><br><br><br><br><br>
    <div class="mdui-card-primary-title"><h2><?php $this->title() ?></h2></div>
        <div class="mdui-card-primary-subtitle"><h4><?php $this->author(); ?> · <?php $this->date(); ?> · <?php get_post_view($this) ?>浏览 · <?php $this->category(',', false, '无分类'); ?></h4></div>

    </div>
  </div>
</div>
<!--主布局容器开始-->
<div class="mdui-container">
<br><!--内容开始-->
<div class="yuan mdui-col-md-8 mdui-col-offset-md-2 mdui-card-primary toup">

<div class="article mdui-typo">

<?php echo Fancybox($this->content); ?>

<br>
<br>
</div>
<div class="hr mdui-typo">
<hr>
<p><small>本文遵循 CC BY-NC-SA 4.0 版权协议</small></p>
<hr>
<?php $this->need('config/comments.php'); ?>
<br>
</div>
</div><!--内容结束-->
</div><!--主布局容器结束-->


<?php $this->need('config/footer.php'); ?>
