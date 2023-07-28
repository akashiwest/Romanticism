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
 * @version 2.0
 * @link https://blog.imakashi.top/
 */

 if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('config/header.php'); ?>

<div class="mdui-shadow-0 articlecard mdui-card show">
  <div class="mdui-valign articlecard mdui-text-center">
    <div class="mdui-card-primary easysee mdui-center">
      <div class="mdui-card-primary-title"><h2><?php $this->title() ?></h2></div>
        <div class="mdui-card-primary-subtitle"><h4><?php $this->author(); ?> · <?php $this->date(); ?> · <?php get_post_view($this) ?>浏览 · <?php $this->category(',', false, '无分类'); ?></h4></div>
    </div>
  </div>
  <div class="articlecardshadow"></div>
  <div class="articlecardimg" <?php if(($this->title) == '欢迎使用 Typecho' && ($this->fields->AKAROMarticleimg) == null): ?>style="background-image: url('<?php $this->options->themeUrl('config/style/img/default/first.png'); ?>');" <?php else: ?> style="background-image: url('<?php $this->fields->AKAROMarticleimg(); ?>');background-color: <?php $this->fields->AKAROMarticlecolor(); ?>;" <?php endif; ?>></div>
</div>

<!--主布局容器开始-->
<div class="LDtrans">
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
<p class="copyright">· 文章最后更新时间为：<?php echo date('Y年m月d日H时' , $this->modified); ?>
<?php if ($this->fields->AKAROMarticleCopyright != 'hide' && $this->fields->AKAROMarticleCopyright != null): ?>
  <?php if ($this->fields->AKAROMarticleCopyright == 'SA'): ?>
    <br>· 本文章版权声明： 遵循 <a target="_blank" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh"> CC BY-NC-SA </a> 版权协议</p>
    <?php elseif ($this->fields->AKAROMarticleCopyright == 'ND'): ?>
      <br>· 本文章版权声明： 遵循 <a target="_blank" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.zh"> CC BY-NC-ND </a> 版权协议</p>
    <?php else: ?>
      <br>· 本文章版权声明： 禁止转载</p>
  <?php endif; ?>
<?php endif; ?>
<hr>
<?php $this->need('config/comments.php'); ?>
<br>
</div>
</div><!--内容结束-->
</div><!--主布局容器结束-->


<?php $this->need('config/footer.php'); ?>
