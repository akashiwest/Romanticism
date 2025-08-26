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
 * @version 2.2
 * @link https://imakashi.eu.org/
 * @date 2025-08-20
 **/

 $this->need('config/header.php');
 ?>

<?php /*加载动画*/ if (!empty($this->options->AKAROMfucset) && in_array('AKAROMindexloading', $this->options->AKAROMfucset)): ?>
<div class="loadingbg blur" id="loading">
  <div id="loading_bg">
    <div class="loader">
      <div class="loader-box">
        <noscript>
          <b>无法加载网页：</b>需要 Javascript
        </noscript>
        <div style="margin-top:0px;">
          <div class="loadingtx loading-text">
            <span>内</span>
            <span>容</span>
            <span>正</span>
            <span>在</span>
            <span>载</span>
            <span>入</span>
          </div>
        </div>
        <br>
        <span class="akarom-alter-button-valign">
          <span class="akarom-alter-button blur yuan mdui-center" style="margin-top:15px;opacity:0;filter:blur(10px);transition:all .3s ease;font-size:15px;" id="cancelLoadingBtn">
            在后台加载
          </span>
        </span>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<!--首页主题图-->
<div class="mdui-shadow-0 indeximgcard mdui-card indeximg" id="indeximg" style="background-image: url('<?php if(empty($this->options->AKAROMindeximg)): ?><?php $this->options->themeUrl('config/style/img/default/indeximg.webp'); ?><?php else: ?><?php $this->options->AKAROMindeximg(); ?><?php endif; ?>');">
<div class="mdui-card-media-covered indeximgcard mdui-valign ">
      <div class="mdui-center mdui-card-primary easysee">
      <h1 class="mdui-typo-display-1 titlegap">
        <?php if (!empty($this->archiveTitle)): ?>
          <?php $this->archiveTitle(array(
              'category'  =>  _t('分类 [<span>%s</span>] 下的文章'),
              'search'    =>  _t('包含关键字 [<span>%s</span>] 的文章'),
              'tag'       =>  _t('含有 [<span>%s</span>] 标签的文章')
            ), '', ''); ?>
            <?php else: ?>
            <?php
            echo $this->options->description();
             ?>
            <?php endif; ?>
      </h1>
    </div>
  </div>
</div>

<!--主布局容器开始-->
<div class="LDtrans">


<!-- 类型筛选器 -->
<div class="akarom-articletag akarom-articletag-index blur mdui-shadow-0">
    <i class="mdui-icon material-icons">panorama_fish_eye</i>
    <div class="akarom-articletag-options">
        <input type="radio" name="filter" id="filterall" value="all">
        <label for="filterall" class="filter-btn akarom-hoverable">全部</label> 
        
        <input type="radio" name="filter" id="filterarticle" value="article">
        <label for="filterarticle" class="filter-btn akarom-hoverable">文章</label> 
        
        <input type="radio" name="filter" id="filtersms" value="sms">
        <label for="filtersms" class="filter-btn akarom-hoverable">短讯</label>
    </div>
</div>


<!--内容开始-->
<div class="indexlistbox mdui-container">

<div class="mdui-shadow-0 mdui-col-md-8 mdui-col-offset-md-2 mdui-card-primary toup">

<?php if (empty($this->archiveTitle) && !empty($this->options->AKAROMinfobox)): ?><!--通知容器-->
<div class="indexinfobox blur yuan mdui-card mdui-center mdui-text-center mdui-shadow-0">
  <span class="info">
    <b><?php $this->options->AKAROMinfobox(); ?></b>
  </span>
</div>
<?php endif; ?>

<?php if($this->options->AKAROMsticky != null): ?>
<div class="sticky-wrapper yuan LDtrans">
  <div class="sticky-badge blur mdui-shadow-0">
    <i class="mdui-icon material-icons">bookmark_border</i>
  </div>
<div class="sticky-container">
<div style="padding: 10px;">
<?php 
$stickynumbers = $this->options->AKAROMsticky;
$stickynumbers = array_filter(array_unique(explode(',', $stickynumbers)));

foreach ($stickynumbers as $stickynum): ?>
  <?php 
    $post = Typecho_Widget::widget('Widget_Archive@cid_' . $stickynum, 'type=post', 'cid=' . $stickynum); 
  ?>
    
      <div class="mdui-card btnyuan sticky-item mdui-shadow-0">
        <div class="mdui-card-media">
          <img src="
            <?php if ($post->fields->AKAROMarticleimg != null): ?>
            <?php $post->fields->AKAROMarticleimg(); ?>
            <?php else: ?>
            <?php $randomNum = mt_rand(1, 12);$this->options->themeUrl("config/style/img/default/cover/{$randomNum}.webp"); ?>
            <?php endif; ?>
          " loading="lazy">

          <div class="mdui-card-media-covered">
            <div class="mdui-card-primary">
              <div class="mdui-card-primary-title mdui-text-truncate easysee">
                <h5><a class="title chameleon underline" onclick="window.location.href='<?php echo $post->permalink; ?>'">&nbsp;<?php echo $post->title; ?>&nbsp;</a></h5></div>
            </div>
          </div>
        </div>
      </div>

<?php endforeach; ?>
</div>
</div>
</div>
<br>
<?php endif; ?>

<h1 class="tagnotice tagnotice-sms"><i style="margin-bottom:5px;" class="mdui-icon material-icons">chat_bubble_outline</i> 查看短讯</h1>
<h1 class="tagnotice tagnotice-article"><i style="margin-bottom:5px;" class="mdui-icon material-icons">chat</i> 文章列表</h1>

<?php if ($this->have()): ?>
	<?php //输出每一篇文章的主页卡片
    while($this->next()): 
    if(!empty($stickynumbers) && in_array($this->cid, $stickynumbers)) continue; ?>


<?php if ($this->fields->AKAROMarticleSMS == 'sms'): //短讯SMS样式 ?>

<div class="taglist tagsms">
<div class="blur mdui-card yuan mdui-shadow-0 articlesms">

  <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
  <div class="mdui-card-media">
    <img src="<?php $this->fields->AKAROMarticleimg(); ?>" loading="lazy">

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
    <div class="mdui-card-primary-subtitle title"><?php $this->date(); ?> · <?php $this -> commentsNum('0 评论', '1 评论', '%d 评论'); ?></div>
  </div>

  <!-- 卡片的内容 -->
  <div class="mdui-card-content mdui-typo">
  

    <?php
      $content = $this->content;
      $tocResult = generateTOC($content);

      $content = $tocResult['content'];
      $content = Fancybox($content);
      $content = parseCustomGitHubTag($content);
      echo $content;
    ?>


     <button style="margin-bottom:15px;margin-top:-10px;" onclick="window.location.href='<?php $this->permalink() ?>'" class="mdui-btn btnyuan mdui-float-right">评论区</button>
  </div>

</div>
<br>
</div>


<?php else: //正常文章样式 ?>
<div class="taglist tagarticle">
<div class="yuan articlelistcard mdui-card mdui-valign mdui-text-center articlelistimg mdui-shadow-0 AKAROMlazyload" 
data-bg="
<?php if (($this->cid == 1) && ($this->fields->AKAROMarticleimg == null)): ?>
<?php $this->options->themeUrl('config/style/img/default/Romanticism2theme-empty.webp'); ?>
<?php elseif ($this->fields->AKAROMarticleimg != null): ?>
<?php $this->fields->AKAROMarticleimg(); ?>
<?php else: ?>
<?php $randomNum = mt_rand(1, 12);$this->options->themeUrl("config/style/img/default/cover/{$randomNum}.webp"); ?>
<?php endif; ?>
">
  <div class="mdui-valign mdui-card-media-covered articlelistcard">
      <div class="mdui-card-primary easysee mdui-center">
        <div class="mdui-card-primary-title">
          <h3 class="mdui-hidden-xs-down">
            <a class="title chameleon underline" onclick="window.location.href='<?php $this->permalink() ?>'">&nbsp;<?php $this->title(); ?>&nbsp;</a>
          </h3>
          <h4 class="mdui-hidden-sm-up">
            <a class="title chameleon underline" onclick="window.location.href='<?php $this->permalink() ?>'">&nbsp;<?php $this->title(); ?>&nbsp;</a>
          </h4></div>
        <div class="mdui-card-primary-subtitle"><h5><?php $this->date(); ?> · <?php $this->category(',', false, '无分类'); ?> · <?php $this -> commentsNum('0 评论', '1 评论', '%d 评论'); ?></h5></div>
    </div>
  </div>
</div>
<br>
</div>


<?php endif; ?>

<?php endwhile; ?>
<?php //如果找不到搜索内容或无文章
  else: ?>

<div class="yuan articlelistcard mdui-card mdui-valign mdui-text-center articlelistimg mdui-shadow-0" style="background-image: url('<?php $this->options->themeUrl('config/style/img/default/Romanticism2theme-empty.webp'); ?>');">
  <div class="mdui-valign mdui-card-media-covered articlelistcard">
      <div class="mdui-card-primary easysee mdui-center">
        <div class="mdui-card-primary-title">
          <h3 class="mdui-hidden-xs-down">
            &nbsp;这里是空荡的原野...&nbsp;
          </h3>
          <h4 class="mdui-hidden-sm-up">
            &nbsp;这里是空荡的原野...&nbsp;
          </h4></div>
        <div class="mdui-card-primary-subtitle"><h5><?php if ($this->user->hasLogin()): ?><a class="chameleon underline" onclick="window.location.href='<?php $this->options->adminUrl(); ?>write-post.php'">点击发布新文章</a><?php else: ?><a class="chameleon underline" onclick="window.location.href='<?php $this->options->siteUrl(); ?>'">返回首页</a><?php endif; ?></h5></div>
    </div>
  </div>
</div>
<br>

<?php endif; ?>
<!--上下翻页-->
<?php if (ceil($this->getTotal() / $this->parameter->pageSize) != '1'): ?>
	<div class="mdui-text-center">
	  <p>
	    <h4 class="title mdui-text-center outlineborder blur akarom-alter-button">
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
