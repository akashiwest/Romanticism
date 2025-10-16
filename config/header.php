<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * header.php 页首文件
 * @version 2.2
 * @link https://imakashi.eu.org/
**/
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="zh-CN" class="no-js">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta name="copyright" content="Copyright(C)<?php echo date('Y');?> <?php $this->options->title() ?>"/>
    <meta name="author" content="<?php $this->author(); ?>"/>
    <meta name="TypechoTemplateInfo" content="Creator: Akashi Nishikata; Link: imakashi.eu.org; Release: 2025-08">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

    <link href="<?php $this->options->AKAROMsign(); ?>" rel="icon" type="image/x-icon"><!--图标-->

    <link href="https://fonts.loli.net/css2?family=Noto+Serif+SC:wght@400;900&amp;display=swap" rel="stylesheet">

    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/mdui/css/mdui.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/romanticism.aka.css?v=2.2'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/prism.highlight.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/jquery.fancybox.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/icon.aka.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/OwO.css'); ?>">

    <!-- 自定义CSS -->
    <?php if(!empty($this->options->AKAROMcustomCss)): ?>
        <style type="text/css">
          <?php $this->options->AKAROMcustomCss(); ?>
        </style>
    <?php endif; ?>

</head>
<!--[if IE 9]>
    <div style="z-index:99999;position:fixed;background-color:white;height:100vh;width:100vw;padding-top:40vh;padding-left:15vw;padding-right:15vw;font-size:23px;word-wrap:break-word;">当前网页 <strong>不支持</strong> 你的浏览器<br><br>请 <a href="https://browsehappy.com/" style="color:rgb(233,100,100);">升级浏览器</a></div>
<![endif]-->

<body class="mdui-theme-layout-light mdui-theme-primary-blue mdui-theme-accent-red">

  <script>
    if (localStorage.romanticismTheme) {
        document.body.classList.add("mdui-theme-layout-dark");
      }
  </script>

<div class="mdui-appbar blur mdui-appbar-fixed mdui-shadow-0">
    <div class="mdui-toolbar">
      <a class="mdui-hidden-xs-down"></a>
      <button class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#mainsidebar', overlay: true}"><i class="mdui-icon material-icons">menu</i></button>
      <a class="mdui-typo-title chameleon" href="<?php $this->options ->siteUrl(); ?>"><b><?php $this->options->title(); ?></b></a>
      <div class="mdui-toolbar-spacer"></div>
      <button class="mdui-btn mdui-btn-icon" mdui-dialog="{target: '#search'}"><i class="mdui-icon material-icons">search</i></button>
      <button type="button" class="mdui-btn mdui-btn-icon" id="switch-theme"> <i class="mdui-icon material-icons">brightness_6</i></button>
      <a class="mdui-hidden-xs-down"></a>
    </div>
  </div>
  <div class="mdui-dialog yuan blur mdui-shadow-0" id="search">
  <div class="mdui-container">
    <div class="mdui-typo">
    <h3 class="mdui-valign"><i class="mdui-icon material-icons">search</i>&nbsp;搜索一下</h3>
    <form id="searchform" method="post" action="" role="search">
    <div class="mdui-row">
      <div class="mdui-col-xs-8 mdui-col-sm-10">
        <input class="mdui-textfield-input" type="text" id="s" name="s" placeholder="请输入搜索关键字" maxlength="30"/>
      </div>
      <div class="mdui-col-xs-4 mdui-col-sm-2">
            <span class="akarom-alter-button-valign">
              <span class="akarom-alter-button blur yuan mdui-center" id="submitSearch">
                <i class="mdui-icon material-icons">bubble_chart</i><b>搜索</b>
              </span>
            </span>
      </div>

      <script>
        document.getElementById("submitSearch").addEventListener("click", function() {
          document.getElementById("searchform").submit();
        });
      </script>

    </div>
    <h3 class="mdui-valign"><i class="mdui-icon material-icons">label_outline</i>&nbsp;标签云</h3>
      <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=rand()&ignoreZeroCount=1&desc=0&limit=15')->to($tags); ?>
      <?php if($tags->have()): ?>
      <?php while ($tags->next()): ?>
        <?php echo'
            <div class="btnyuan outlineborder"><a href="'.$tags->permalink.' " rel="tag"><b>#'.$tags->name.'</b></a> <span class="mdui-typo-caption-opacity"> ('.$tags->count.')</span></div>
        '; ?>
      <?php endwhile; ?>
      <?php else: ?>
        <?php _e('未找到含有标签的文章'); ?>
      <?php endif; ?> 
    <br><br>
    </form>
  </div>
  </div>
</div>

<?php $this->need('config/sidebar.php');?>




    
    
