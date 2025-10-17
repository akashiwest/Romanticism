<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * 友情链接页
 *
 * @package custom
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
<div class="mdui-container linkpage">
<br><!--内容开始-->
<div class="yuan mdui-col-md-8 mdui-col-offset-md-2 mdui-card-primary toup">

<div class="mdui-typo">


<h1>我的朋友们</h1>
<div class="mdui-row-xs-1 mdui-row-sm-1 mdui-row-md-1 mdui-row-lg-2 mdui-row-xl-2"> 

<?php //我写不来瞎写的，大佬手下留情！(*/ω＼*)
if($this->content == null){
  ?>
  <div class="blur btnyuan mdui-card mdui-shadow-0 akarom-links mdui-m-y-1">
      <div class="mdui-card-header">
        <img class="mdui-card-header-avatar" onclick="window.location.href='<?php $this->options ->siteUrl('/admin'); ?>'" title="headicon" src="<?php if(empty($this->options->AKAROMlogoUrl)): ?><?php $this->options->themeUrl('config/style/img/default/user.jpg'); ?><?php else: ?><?php $this->options->AKAROMlogoUrl(); ?><?php endif; ?>">
        <div class="mdui-card-header-title">
          <b><a target="_blank" href="<?php $this->options ->siteUrl(); ?>">
            <?php $this->options->title(); ?>
          </b></a></div>
        <div class="mdui-card-header-subtitle">
          <?php $this->options->AKAROMindexslogen(); ?>
        </div>
      </div>
    </div>
    <?php
}else{
$friendlink = $this->content;
$friendlink = str_replace('[icon]','

  <div class="mdui-col">
    <div class="blur btnyuan mdui-card mdui-shadow-0 akarom-links mdui-m-y-1">
      <div class="mdui-card-header">
        <img class="mdui-card-header-avatar" src="

  ',$friendlink);
  $friendlink = str_replace('[link]','

        "/>
        <div class="mdui-card-header-title"><b><a target="_blank" href="

  ',$friendlink);
  $friendlink = str_replace('[name]','">',$friendlink);

  $friendlink = str_replace('[desc]','

        </a></b></div>
        <div class="mdui-card-header-subtitle">

        ',$friendlink);
  $friendlink = str_replace('[end]','
        </div>
      </div>
    </div>
  </div>


  ',$friendlink);
echo $friendlink;
}
?>

</div>

<h1>哈喽，来交个朋友吧！</h1>

   <blockquote>
    <?php if(!empty($this->options->AKAROMLinksterms)): ?>
     <b>要求</b><br>
     <?php $this->options->AKAROMLinksterms(); ?>
     <br><br>
   <?php endif; ?>
     <b>我的信息</b><br>
     博客标志：<?php $this->options->AKAROMlogoUrl(); ?><br>
     地址：<?php empty($this->options->AKAROMLinkstermsUrl) ? $this->options->siteUrl() : $this->options->AKAROMLinkstermsUrl(); ?><br>
     标题：<?php $this->options->title() ?><br>
     描述：<?php $this->options->AKAROMindexslogen(); ?><br><br>
     <b>交换的格式</b><br>
     [icon]网站标志或头像的图片链接<br>
     [link]你的网站网址<br>
     [name]你的网站标题<br>
     [desc]简单介绍一下你的网站吧<br>
     [end]
  </blockquote>
  <b>请通过下面的评论按照格式交换友链呀！</b>
  <br> <br>

</div>
<div class="hr mdui-typo">



<div class="mdui-typo blur LDtrans yuan akarom-panel-copy">
<div class="akarom-corner-symbol-rb">✨</div>
<?php if($this->user->hasLogin()): ?>
  <span class="akarom-alter-button-valign" onclick="window.open('<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php $this->cid(); ?>', '_blank')">
    <span class="akarom-alter-button blur yuan mdui-center">
      <i class="mdui-icon material-icons">border_color</i><b>编辑友情链接</b>
    </span>
  </span>
  <br>
<?php endif; ?>

<p class="copyright mdui-text-center">
  最后更新时间：<?php echo date('Y年m月d日' , $this->modified); ?>
</div>



<?php $this->need('config/comments.php'); ?>
<br>
</div>
</div><!--内容结束-->
</div><!--主布局容器结束-->
<?php $this->need('config/footer.php'); ?>
