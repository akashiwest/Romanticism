<?php
/**
 
    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * comments.php 评论区配置文件
 * @version 2.2
 * 参考自 Typecho 自带的默认主题
**/
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $GLOBALS['theme_url'] = $this->options->themeUrl;
?>


<!--展示评论区-->
<?php 
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass = '<b><span class="btnyuan adminsign blur" style="margin-left:0;"> 作者 </span></b>';
        }
    }
    // 如果评论状态是审核中
    if ($comments->status != 'approved') {
        $comments->content = '<span class="btnyuan adminsign blur" style="margin-left:-5px;"> 当前评论将在审核后展示 </span>' . $comments->content;
    }
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
?>">
    <div id="<?php $comments->theId(); ?>" style="margin-bottom:10px;">
        <div class="comment-author ">
            <span itemprop="image">
                <?php 
                    $mail = md5($comments->mail);
                    $headicon = 'https://cravatar.cn/avatar/'.$mail.'.png';
                    echo '<img class="headicon" src="'.$headicon.'" height="46px" width="46px" style="border-radius:50%;float:left;margin-top:0px;margin-right:10px;margin-bottom:-2px" loading="lazy">'; 
                ?>
            </span>
            <p>
                <b style="position: relative; top: 1px;"><?php $comments->author(); ?></b>
                <small class="mdui-typo-caption-opacity">
                    <?php echo $commentClass; ?><?php getOs($comments->agent); ?> <?php getBrowser($comments->agent); ?>
                </small>
            </p>
        </div>
        <div class="mdui-typo-caption-opacity">
            <?php $comments->date('y-m-d H:i'); ?> · <b><?php $comments->reply('回复'); ?></b>
        </div>
        <?php 
            // 解析带表情的评论内容
            $parsedComment = preg_replace_callback(
                '#\@OwO(b)?\((.*?)\)#',
                function ($matches) {
                    $width = $matches[1] ? '50' : '30';
                    $emoticon = $matches[2];
                    $themeUrl = htmlspecialchars($GLOBALS['theme_url'], ENT_QUOTES, 'UTF-8');
                    return '<img style="width:' . $width . 'px; height:auto; margin-bottom:-7px;" src="' . $themeUrl . '/config/style/img/bili/' . $emoticon . '.webp" loading="lazy" alt="' . $emoticon . '">';
                },
                $comments->content
            );
            echo '<div style="padding-top:5px;">' . $parsedComment . '</div>';
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
                当前登录身份：<?php $this->author->screenName(); ?><br><br>
                <span class="akarom-alter-button-valign mdui-float-left">
                    <span class="akarom-alter-button blur yuan" onclick="OwO_show()">
                        <i class="mdui-icon material-icons">face</i><b>表情</b>
                    </span>
                </span>
                <br><br>
                <?php $this->need('config/OwO.php'); ?>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">textsms</i>
                    <textarea class="mdui-textfield-input" name="text" id="textarea" placeholder="开始发表评论吧" required><?php $this->remember('text'); ?></textarea>
                    <div class="mdui-textfield-error">内容不能为空</div>
                </div>
                <?php AKAROM_simple_captcha_math();?>
            <?php else: ?>                                                          <!--非登录状态下-->
                <span class="akarom-alter-button-valign mdui-float-left">
                    <span class="akarom-alter-button blur yuan" onclick="OwO_show()">
                        <i class="mdui-icon material-icons">face</i><b>表情</b>
                    </span>
                </span>
                <br><br>
                <?php $this->need('config/OwO.php'); ?>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">textsms</i>
                    <textarea class="mdui-textfield-input" name="text" id="textarea" placeholder="说点什么吧~" required><?php $this->remember('text'); ?></textarea>
                    <div class="mdui-textfield-error">内容不能为空</div>
                </div>

                <div class="mdui-row">
                    <div class="mdui-col-sm-6">
                        <div class="mdui-textfield">
                            <img class="mdui-icon material-icons" id="preheadicon" src="https://cravatar.cn/avatar/default.png" height="34px" width="34px" style="border-radius:50%;float:left;margin-left:-5px;margin-bottom:-5px">
                            <input class="mdui-textfield-input" name="author" id="author" type="text" placeholder="昵称" value="<?php $this->remember('author'); ?>" required/>
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
            <span class="akarom-alter-button-valign">
                <span class="akarom-alter-button akarom-alter-button-disabled blur yuan mdui-center" id="submitComment">
                    <i class="mdui-icon material-icons">keyboard</i><b>发表评论</b>
                </span>
            </span>
            <script>
            function checkInputs() {
              const textarea = document.getElementById("textarea");
              
              const button = document.getElementById("submitComment");

              if (!textarea || !button) {
                return;
              }

              if (textarea.value.trim() !== "") {
                button.classList.remove("akarom-alter-button-disabled");
              } else {
                button.classList.add("akarom-alter-button-disabled");
              }
            }

            document.getElementById("textarea").addEventListener("input", checkInputs);

            document.getElementById("submitComment").addEventListener("click", function() {
              if (!document.getElementById("submitComment").classList.contains("akarom-alter-button-disabled")) {
                document.getElementById("comment-form").submit();
              }
            });
            </script>
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
    <span class="outlineborder">
      <?php $comments->pageNav('< 前一页', '后一页 >'); ?>
    </span>
    <?php endif; ?>
    <?php if (!$comments->have()): ?>
      <?php if($this->allow('comment')): ?>
        <h3 class="mdui-valign">
          <i class="mdui-icon material-icons">star_outline</i>&nbsp;咱快来抢个沙发吧！
        </h3>
      <?php endif; ?>
    <?php endif; ?>
</div>
