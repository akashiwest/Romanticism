<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * 在明石的简洁设计中捕捉日常生活中流露出的浪漫主义。
 * 
 * @package Romanticism
 * @author 明石
 * @version 1.0
 * @link https://blog.imakashi.top/
 * @date 2023-01-20
 **/

 $this->need('config/header.php');
 ?>

<?php /*加载动画*/ if (!empty($this->options->AKAROMfucset) && in_array('AKAROMindexloading', $this->options->AKAROMfucset)): ?>
<div id="loading">
    <div id="loading_bg">
        <div class="loader">
		<div class="cs-loader">
  <div class="cs-loader-inner">
    <label>正</label>
    <label>在</label>
    <label>加</label>
    <label>载</label>
    <label>中</label>
  </div>
</div>
		</div>
    </div>
</div>
<?php endif; ?>

<!--主页顶图-->
<div class="mdui-shadow-0 mdui-ripple indeximgcard mdui-card indeximg show" style="background-image: url('<?php $this->options->AKAROMindeximg(); ?>');">  
<div class="mdui-card-media-covered indeximgcard mdui-valign ">
      <div class="mdui-center mdui-card-primary easysee">
      <h1 class="mdui-typo-display-1 titlegap"><?php $this->options->description() ?></h1>
    </div>
  </div>
</div>


<!--主布局容器开始-->
<div class="mdui-container">
  <!--内容开始-->
<div class="mdui-shadow-0 mdui-col-md-8 mdui-col-offset-md-2 mdui-card-primary toup">

<br>

<?php if ($this->have()): ?>
	<?php while($this->next()): ?>

<div class="mdui-shadow-0 yuan mdui-ripple articlelistcard mdui-card mdui-valign mdui-text-center articleimg" style="background-image: url('<?php $this->fields->AKAROMarticleimg(); ?>');background-color: <?php $this->fields->AKAROMarticlecolor(); ?>;">
  <div class="mdui-card-media-covered articlelistcard">
      <div class="mdui-card-primary easysee">
        <br><br>
        <div class="mdui-card-primary-title">
          <h3 class="mdui-hidden-xs-down">
            <a class="title chameleon underline" onclick="window.location.href='<?php $this->permalink() ?>'"><?php $this->title() ?></a>
          </h3>
          <h4 class="mdui-hidden-sm-up">
            <a class="title chameleon underline" onclick="window.location.href='<?php $this->permalink() ?>'"><?php $this->title() ?></a>
          </h4></div>
        <div class="mdui-card-primary-subtitle"><h5><?php $this->date(); ?> · <?php $this -> commentsNum('0 评论', '1 评论', '%d 评论'); ?></h5></div>
    </div>
  </div>
</div>
<br>

<?php endwhile; ?>
<?php else: ?>

	<div class="mdui-shadow-0 yuan mdui-ripple mdui-hoverable articlelistcard mdui-card mdui-valign mdui-text-center articleimg" style="background-color: MistyRose;">
  <div class="mdui-card-media-covered articlelistcard">
      <div class="mdui-card-primary easysee">
      <br><br>
        <div class="mdui-card-primary-title"><h3>花朵正在等待绽放</div><h3>
		<div class="mdui-card-primary-subtitle"><h5><?php if ($this->user->hasLogin()): ?><a class="chameleon underline" onclick="window.location.href='<?php $this->options->adminUrl(); ?>/write-post.php'">点击发布新文章</a><?php endif; ?></h5></div>
    </div>
  </div>
</div>
<br>

<?php endif; ?>
<br>
<!--上下翻页相关功能 开始-->
	<div class="mdui-text-center">
	<p>
	<h4 class="title mdui-text-center pageupdown">
  <?php $this->pageLink('&nbsp;&nbsp;&nbsp;&nbsp;上一页&nbsp;&nbsp;&nbsp;&nbsp;'); ?>
  <?php $this->pageLink('&nbsp;&nbsp;&nbsp;&nbsp;下一页&nbsp;&nbsp;&nbsp;&nbsp;','next'); ?>
  </h4>
		</p>
</div><!--上下翻页相关功能 结束-->

</div><!--内容结束-->

</div><!--主布局容器结束-->

<?php $this->need('config/footer.php'); ?>
