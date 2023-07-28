<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * 在明石的简洁设计中捕捉日常生活中流露出的浪漫主义。
 * 
 * @package Romanticism
 * @author 明石
 * @version 2.0
 * @link https://blog.imakashi.top/
 * @date 2023-07-28
 **/

 $this->need('config/header.php');
 ?>

<?php /*加载动画*/ if (!empty($this->options->AKAROMfucset) && in_array('AKAROMindexloading', $this->options->AKAROMfucset)): ?>
<div class="blur" id="loading">
  <div id="loading_bg">
		<div class="loader">
      <div class="loader-box">
        <noscript>
        <b>无法加载网页：</b>需要 Javascript
        </noscript>
        <div class="mdui-text-color-blue-200 mdui-spinner"></div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<!--首页主题图-->
<div class="mdui-shadow-0  indeximgcard mdui-card indeximg" style="background-image: url('<?php if(empty($this->options->AKAROMindeximg)): ?><?php $this->options->themeUrl('config/style/img/default/indeximg.png'); ?><?php else: ?><?php $this->options->AKAROMindeximg(); ?><?php endif; ?>');">
<div class="mdui-card-media-covered indeximgcard mdui-valign ">
      <div class="mdui-center mdui-card-primary easysee">
      <h1 class="mdui-typo-display-1 titlegap">
        <?php if (!empty($this->archiveTitle)): ?>
          <?php $this->archiveTitle(array(
              'category'  =>  _t('分类 “<span>%s</span>” 下的文章'),
              'search'    =>  _t('包含关键字 “<span>%s</span>” 的文章'),
              'tag'       =>  _t('含有 “<span>%s</span>” 标签的文章')
            ), '', ''); ?>
            <?php else: ?>
            <?php $this->options->description(); ?>
            <?php endif; ?>
      </h1>
    </div>
  </div>
</div>

<!--主布局容器开始-->
<div class="LDtrans">
<div class="indexlistbox mdui-container">
  <!--内容开始-->
<div class="mdui-shadow-0 mdui-col-md-8 mdui-col-offset-md-2 mdui-card-primary toup">

<br>
<?php if (empty($this->archiveTitle) && !empty($this->options->AKAROMinfobox)): ?><!--通知容器-->
<div class="indexinfobox blur yuan mdui-card mdui-center mdui-text-center mdui-hoverable">
  <span class="info">
    <b><?php $this->options->AKAROMinfobox(); ?></b>
  </span>
</div>
<?php endif; ?>

<?php if ($this->have()): ?>
	<?php //输出每一篇文章的主页卡片
    while($this->next()): ?>

<?php if ($this->fields->AKAROMarticleSMS == 'sms'): //短讯SMS样式 ?>

<div class="blur mdui-card yuan mdui-hoverable articlesms">

  <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
  <div class="mdui-card-media">
    <img src="<?php $this->fields->AKAROMarticleimg(); ?>"/>

    <!-- 卡片中可以包含一个或多个菜单按钮 -->
    <div class="mdui-card-menu">
      <button class="btnyuan mdui-btn easysee mdui-text-color-white">
        <i class="mdui-icon material-icons">chat_bubble_outline</i> <b>短讯</b>
      </button>
    </div>
  </div>

  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <?php if (!empty($this->title)): ?>
    <div class="mdui-card-primary-title"><b>
      <h3 class="mdui-hidden-xs-down">
        <a class="title" onclick="window.location.href='<?php $this->permalink() ?>'"><?php $this->title(); ?></a>
      </h3>
      <h4 class="mdui-hidden-sm-up">
        <a class="title" onclick="window.location.href='<?php $this->permalink() ?>'"><?php $this->title(); ?></a>
      </h4>
    </b></div>
  <?php endif; ?>
    <div class="mdui-card-primary-subtitle title"><?php $this->date(); ?> · <?php $this->category(',', false, '无分类'); ?></div>
  </div>

  <!-- 卡片的内容 -->
  <div class="mdui-card-content"><?php $this->content(); ?></div>
</div>
<br>

<?php else: //正常文章样式 ?>

<div class="yuan articlelistcard mdui-card mdui-valign mdui-text-center articlelistimg mdui-hoverable" <?php if(($this->title) == '欢迎使用 Typecho' && ($this->fields->AKAROMarticleimg) == null): ?>style="background-image: url('<?php $this->options->themeUrl('config/style/img/default/first.png'); ?>');" <?php else: ?> style="background-image: url('<?php $this->fields->AKAROMarticleimg(); ?>');background-color: <?php $this->fields->AKAROMarticlecolor(); ?>;" <?php endif; ?>>
  <div class="mdui-valign mdui-card-media-covered articlelistcard">
      <div class="mdui-card-primary easysee mdui-center">
        <div class="mdui-card-primary-title">
          <h3 class="mdui-hidden-xs-down">
            <a class="title chameleon underline" onclick="window.location.href='<?php $this->permalink() ?>'">&nbsp;<?php $this->title(); ?>&nbsp;</a>
          </h3>
          <h4 class="mdui-hidden-sm-up">
            <a class="title chameleon underline" onclick="window.location.href='<?php $this->permalink() ?>'">&nbsp;<?php $this->title(); ?>&nbsp;</a>
          </h4></div>
        <div class="mdui-card-primary-subtitle"><h5><?php $this->date(); ?> · <?php $this -> commentsNum('0 评论', '1 评论', '%d 评论'); ?></h5></div>
    </div>
  </div>
</div>
<br>

<?php endif; ?>

<?php endwhile; ?>
<?php //如果找不到搜索内容或无文章
  else: ?>

	<div class="yuan  articlelistcard mdui-card mdui-valign mdui-text-center articleimg mdui-hoverable" style="background-color: Lavender;">
  <div class="mdui-card-media-covered articlelistcard">
      <div class="mdui-card-primary easysee">
      <br><br>
        <div class="mdui-card-primary-title"><h3>没有找到内容呢</div><h3>
		<div class="mdui-card-primary-subtitle"><h4><?php if ($this->user->hasLogin()): ?><a class="chameleon underline" onclick="window.location.href='<?php $this->options->adminUrl(); ?>write-post.php'">点击发布新文章</a><?php else: ?><a class="chameleon underline" onclick="window.location.href='<?php $this->options->siteUrl(); ?>'">返回首页</a><?php endif; ?></h4 ><br></div>
    </div>
  </div>
</div>
<br>

<?php endif; ?>
<!--上下翻页-->
<?php if (ceil($this->getTotal() / $this->parameter->pageSize) != '1'): ?>
	<div class="mdui-text-center">
	  <p>
	    <h4 class="title mdui-text-center outlineborder">
        <?php $this->pageLink('&nbsp;&nbsp;&nbsp;&nbsp;上一页&nbsp;&nbsp;&nbsp;&nbsp;'); ?>
        <?php $this->pageLink('&nbsp;&nbsp;&nbsp;&nbsp;下一页&nbsp;&nbsp;&nbsp;&nbsp;','next'); ?>
      </h4>
	  </p>
</div>

<?php endif; ?>
<!--内容结束-->
</div>
<!--主布局容器结束-->
</div>

<?php $this->need('config/footer.php'); ?>
