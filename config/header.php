<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * header.php 页首文件
 * @version 1.0
**/
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="zh-CN" class="no-js">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta name="copyright" content="Copyright(C) <?php $this->options->title() ?>"/>
    <meta name="author" content="<?php $this->author(); ?>"/>
    <meta name="TemplateInfo" content="Creator.Akashi.Nishikata,2023/01/20">
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

    <link href="<?php $this->options->AKAROMsign(); ?>" rel="icon" type="image/x-icon"><!--图标-->

    <link href="https://fonts.loli.net/css2?family=Noto+Serif+SC:wght@900&display=swap" rel="stylesheet"><!--思源宋体-->
    <link href="https://fonts.loli.net/css2?family=Noto+Serif+SC&display=swap" rel="stylesheet"> 

    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <?php if (!empty($this->options->AKAROMfucset) && in_array('AKAROMindexloading', $this->options->AKAROMfucset)): ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/loading.css'); ?>">
    <?php endif; ?>
    
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/mdui/css/mdui.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/romanticism.aka.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/prism.highlight.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/jquery.fancybox.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/icon.aka.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('config/style/OwO.css'); ?>">
</head>

<body class="mdui-theme-layout-light mdui-theme-primary-pink-100">

<div class="mdui-appbar blur mdui-appbar-fixed mdui-shadow-0">
    <div class="mdui-toolbar">
      <a href="javascript:;" class="mdui-hidden-xs-down"></a>
      <button class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#mainsidebar', overlay: true}"><i class="mdui-icon material-icons">menu</i></button>
      <span class="mdui-typo-title boldtext chameleon titlegap" onclick="window.location.href='<?php $this->options ->siteUrl(); ?>'"><?php $this->options->title(); ?></span>
      <div class="mdui-toolbar-spacer"></div>
      <button type="button" class="mdui-btn mdui-btn-icon" id="switch-theme" mdui-tooltip="{content: '切换显示模式'}"> <i class="mdui-icon material-icons">brightness_6</i></button>
      <a href="javascript:;" class="mdui-hidden-xs-down"></a>
    </div>
  </div>


<?php $this->need('config/sidebar.php');?>

<!--[if IE]>
    <div class="browsehappy" role="dialog">当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a></div>
<![endif]-->




    
    
