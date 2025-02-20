<?php
/**
 
    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * 文章归档页
 *
 * @package custom
 * @author 明石
 * @version 2.1 - 250204
 * @link https://imakashi.eu.org/
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('config/header.php'); ?>

<div class="mdui-shadow-0 articlecard mdui-card show">
  <div class="mdui-valign articlecard mdui-text-center">
    <div class="mdui-card-primary easysee mdui-center">
      <div class="mdui-card-primary-title"><h2>文章归档</div>
        <div class="mdui-card-primary-subtitle">
            <h4>这里保存着往昔</h4>
        </div>
    </div>
  </div>
  <div class="articlecardshadow"></div>
  <div class="articlecardimg"
    style="

    <?php if ($this->fields->AKAROMarticleimg != null): ?>
        background-image: url('<?php $this->fields->AKAROMarticleimg(); ?>');
    <?php else: ?>
        background-image: url('<?php $randomNum = mt_rand(1, 12);$this->options->themeUrl("config/style/img/default/cover/{$randomNum}.webp"); ?>');
    <?php endif; ?>

    ">
  </div>
</div>

<!--主布局容器开始-->
<div class="LDtrans">
<div class="mdui-container">
<br><!--内容开始-->
<div class="yuan mdui-col-md-8 mdui-col-offset-md-2 mdui-card-primary toup">

<div class="article mdui-typo">
 
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
    $year=0; $mon=0; $i=0; $j=0;
    $count = '0';
    while($archives->next()):
        $count = $count + 1;
        $year_tmp = date('Y',$archives->created);
        $mon_tmp = date('m',$archives->created);
        $y=$year; $m=$mon;
        if ($mon != $mon_tmp && $mon > 0) $output .= '';
        if ($year != $year_tmp && $year > 0) $output .= '';
        if ($year != $year_tmp) {
            $year = $year_tmp;
            $output .= '<h1>'. $year .' 年</h1>'; 
        }
       if (!empty($archives->title)) {
        $output .= '<p><span class="mdui-typo-caption-opacity">'.date('n月d日',$archives->created).' </span><a href="'.$archives->permalink .'"> <b>'. $archives->title .'</b></a></p>';
        }
    endwhile;
    echo '<h3>当前共有 '.$count.' 篇文章</h3><br><hr>';
    echo $output;
?>    
<br>
</div>
</div><!--内容结束-->
</div><!--主布局容器结束-->
<?php $this->need('config/footer.php'); ?>