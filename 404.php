<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * 404.php 错误页
 * @version 1.0
**/
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('config/header.php'); ?>

<div class="mdui-card-primary mdui-valign show" style="height:50vh;width:auto;">
      <div class="mdui-card-primary mdui-center">
	  <br><br><br><br><br><br><br><br><br><br>
  <h1>
	来到了空无一物的荒原
   <br>
      <p class="chameleon subtitle"><a class="chameleon underline" onclick="window.location.href='<?php $this->options ->siteUrl(); ?>'">返回首页</a></p>
	</h1>
    </div>
</div>

    <script type="text/javascript" src="<?php $this->options->themeUrl('config/mdui/js/mdui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('config/js/thememode.js'); ?>"></script>

<?php $this->footer(); ?>
</body>
</html>
