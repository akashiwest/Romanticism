<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * comments.php 评论区配置文件
 * @version 2.0
 * 参考自 Typecho 自带的默认主题
**/
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $GLOBALS['theme_url'] = $this->options->themeUrl;
?>


<!--展示评论区-->
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass = '<b><span class="btnyuan adminsign"> 博主 </span></b>';  //如果是文章作者的评论添加样式
        }else{
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
 
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
}else{
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
?>">
<div id="<?php $comments->theId(); ?>">
    <div class="comment-author ">
        <span itemprop="image">
            <?php //Gravatar 头像源
                $mail=$comments->mail;
                $mail=md5($mail);
                $headicon='https://cravatar.cn/avatar/'.$mail.'.png';
                echo '<img class="headicon" src="'.$headicon.'" height="46px" style="border-radius:50%;float:left;margin-top:0px;margin-right:10px;margin-bottom:-2px">'; 
            ?>
        </span>
    <p><b><?php $comments->author(); ?></b><small class="mdui-typo-caption-opacity"><?php echo $commentClass; ?><?php getOs($comments->agent); ?>   <?php getBrowser($comments->agent); ?></small></p>
    </div>
       
    <div class="mdui-typo-caption-opacity"><?php $comments->date('y-m-d H:i'); ?><b><?php $comments->reply(' （回复）'); ?></b></div>
        <?php //引入带表情的评论数据
        $cos = preg_replace('#\@OwO\((.*?)\)#','<img style="width:26px;height:auto;" src="'.$GLOBALS['theme_url'].'/config/style/img/bili/$1.webp">',$comments->content);
        echo $cos;
        ?>
</div>
<div class="content">
    <hr>
</div>
<?php if ($comments->children) { ?>
<div class="comment-children">
    <?php $comments->threadedComments($options); ?>
</div>
<?php } ?>
</li>

<?php } ?>


<!--撰写评论区-->
<div id="comments">
    <h1><i class="mdui-icon material-icons">comment</i>&nbsp;评论区</h1>
    <?php $this->comments()->to($comments); ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
    </div>
    
    	<h3 id="response"><?php _e('添加新评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
                当前登录身份：<?php $this->author->screenName(); ?><br>
                <div class="OwO-logo" onclick="OwO_show()"><!--登录状态下-->
                <kbd>OωO表情</kbd>
                </div>
                <br><br>
                <?php $this->need('config/OwO.php'); ?>
                <div class="mdui-textfield mdui-textfield-floating-label">
              <i class="mdui-icon material-icons">textsms</i>
                <textarea class="mdui-textfield-input" name="text" id="textarea" value="<?php $this->remember('text'); ?>" placeholder="开始发表评论吧" required/></textarea>
                <div class="mdui-textfield-error">内容不能为空</div>
            </div>
            <?php AKAROM_simple_captcha_math();?>
            <?php else: ?>
              <div class="OwO-logo" onclick="OwO_show()"><!--非登录状态下-->
              <kbd>OωO表情</kbd>
              </div>
              <br><br>
              <?php $this->need('config/OwO.php'); ?>
                <div class="mdui-textfield mdui-textfield-floating-label">
              <i class="mdui-icon material-icons">textsms</i>
                <textarea class="mdui-textfield-input" name="text" id="textarea" value="<?php $this->remember('text'); ?>" placeholder="说点什么吧~" required/></textarea>
                <div class="mdui-textfield-error">内容不能为空</div>
            </div>

             <div class="mdui-row">
                <div class="mdui-col-sm-6">
                  <div class="mdui-textfield">
                    <i class="mdui-icon material-icons">account_circle</i>
                    <input class="mdui-textfield-input" name="author" id="author" value="<?php $this->remember('author'); ?>" type="text" placeholder="昵称" required/>
                    <div class="mdui-textfield-error">昵称不能为空</div>
                  </div>
                </div>
                <div class="mdui-col-sm-6">
                  <div class="mdui-textfield">
                    <i class="mdui-icon material-icons">email</i>
                    <input class="mdui-textfield-input" type="email" name="mail" id="mail" value="<?php $this->remember('mail'); ?>" placeholder="电子邮件" required/>
                    <div class="mdui-textfield-error">邮件地址格式错误</div>
                  </div>
                </div>
             </div>
             
             <div class="mdui-row">
                <div class="mdui-col-sm-6">
                  <div class="mdui-textfield">
                    <i class="mdui-icon material-icons">web</i>
                    <input class="mdui-textfield-input" type="url" name="url" id="url" value="<?php $this->remember('url'); ?>" placeholder="网站(选填)(https://)">
                  </div>
                </div>
                <div class="mdui-col-sm-6">
                <?php AKAROM_simple_captcha_math();?>
                </div>
             </div>
         
            <?php endif; ?>
    		<button class="mdui-shadow-1 blur mdui-btn btnyuan mdui-center" type="submit" class="submit"> &nbsp;&nbsp;发表评论&nbsp;&nbsp; </button>
            <br><br>
    	</form>
    </div>
    <?php else: ?>
    <h3 class="mdui-valign">
      <i class="mdui-icon material-icons">error_outline</i>&nbsp;当前评论区已关闭
    </h3>
    <?php endif; ?>
     <hr>
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum( _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <?php $comments->listComments(); ?>
    <span calss="outlineborder">
    <?php $comments->pageNav('< 前一页', '后一页 >'); ?>
    </span>
    <?php endif; ?>
    <?php if (!($comments->have())): ?>
      <?php if($this->allow('comment')): ?>
        <h3 class="mdui-valign"><i class="mdui-icon material-icons">star_outline</i>&nbsp;咱快来抢个沙发吧！</h3>
        <?php endif; ?>
    </hr>
        <?php endif; ?>

    
</div>
