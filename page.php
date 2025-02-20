<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|
                                       
 * Page
 * 独立页面内容输出
 * @author 明石
 * @version 2.1
 * @link https://imakashi.eu.org/
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('config/header.php'); ?>

<div class="mdui-shadow-0 articlecard mdui-card show">
  <div class="mdui-valign articlecard mdui-text-center">
    <div class="mdui-card-primary easysee mdui-center">
      <div class="mdui-card-primary-title"><h2><?php $this->title() ?></h2></div>
        <div class="mdui-card-primary-subtitle"><h4><?php $this->author(); ?> · <?php $this->date(); ?> · <?php get_post_view($this) ?>浏览</h4></div>
    </div>
  </div>
  <div class="articlecardshadow"></div>
  <div class="articlecardimg"

  style="
  <?php if (($this->cid == 1) && ($this->fields->AKAROMarticleimg == null)): ?>
      background-image: url('<?php $this->options->themeUrl('config/style/img/default/Romanticism2theme-empty.webp'); ?>');
  <?php elseif ($this->fields->AKAROMarticleimg != null): ?>
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

<div class="akarom-articletag akarom-articletag-style blur mdui-shadow-1"> 
    <i class="mdui-list-item-icon mdui-icon material-icons">color_lens</i>
    <div class="akarom-articletag-options">
        <span class="akarom-hoverable" id="toggleFont">切换字体</span>
        <b> · </b>
        <span class="akarom-hoverable" id="decrease">A-</span> 
        <b id="fontSize">18</b> 
        <span class="akarom-hoverable" id="increase">A+</span>
    </div>
</div>
  
<br><!--内容开始-->
<div class="yuan mdui-col-md-8 mdui-col-offset-md-2 mdui-card-primary toup">

<div class="article mdui-typo">

<?php $this->content(); ?>

<br>
<br>
</div>
<div class="hr mdui-typo">
<hr style="margin-bottom: 10px;">


<?php if($this->user->hasLogin()): ?>
  <span class="akarom-alter-button-valign" onclick="window.open('<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php $this->cid(); ?>', '_blank')">
    <span class="akarom-alter-button blur yuan mdui-center">
      <i class="mdui-icon material-icons">border_color</i><b>编辑此页面</b>
    </span>
  </span>
  <br>
<?php else: ?>  
<?php if (!empty($this->options->AKAROMrewardimg)): ?>
  <?php if ((!empty($this->fields->AKAROMfucsetreward)) || !($this->fields->AKAROMfucsetreward)): ?>
  <span class="akarom-alter-button-valign" mdui-dialog="{target: '#reward'}">
    <span class="akarom-alter-button blur yuan mdui-center">
      <i class="mdui-icon material-icons">thumb_up</i><b>赞赏文章</b>
    </span>
  </span>
  <div class="mdui-dialog yuan blur" id="reward">
  <div class="mdui-container mdui-center akarom-rewardbox">
    <img class="btnyuan" src="<?php $this->options->AKAROMrewardimg(); ?>">
  </div>
</div>
<br>
<?php endif; ?> 
<?php endif; ?> 

<?php endif; ?>

<p class="copyright mdui-text-center">
  文章最后更新时间为：<?php echo date('Y年m月d日 H时' , $this->modified); ?>
<?php if ($this->fields->AKAROMarticleCopyright != 'hide' && $this->fields->AKAROMarticleCopyright != null): ?>
  <?php if ($this->fields->AKAROMarticleCopyright == 'SA'): ?>
    <br>本文章版权声明： 遵循 <a target="_blank" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh"> CC BY-NC-SA </a> 版权协议</p>
    <?php elseif ($this->fields->AKAROMarticleCopyright == 'ND'): ?>
      <br>本文章版权声明： 遵循 <a target="_blank" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.zh"> CC BY-NC-ND </a> 版权协议</p>
    <?php else: ?>
      <br>本文章版权声明： <b>禁止转载</b></p>
  <?php endif; ?>
<?php endif; ?>


<hr>
<?php $this->need('config/comments.php'); ?>
<br>
</div>
</div><!--内容结束-->
</div><!--主布局容器结束-->


<?php $this->need('config/footer.php'); ?>



