<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * footer.php 页脚文件
 * @version 2.0
**/
?>

<div class="footer mdui-shadow-0 mdui-text-center mdui-card toup">
      <br>
      <span class="title">
        &copy;<?php echo date("Y"); ?> - <?php $this->options->title(); ?>
        <br>
        <?php if($this->options->AKAROMfootericp):?>
            <?php echo'<br>';
                  echo $this->options->AKAROMfootericp; ?>
            </span>
          <?php else: ?>
            </span>
        <?php endif;?>
         <br>
         <!-- 已经弄得很不显眼了，请不要删除以下信息 -->
      <small style="opacity: .5;">Theme <b><a class="chameleon underline" onclick="window.location.href='https://blog.imakashi.top/archives/themeRomanticism.html'">Romanticism</a></b> by <a class="chameleon underline" onclick="window.location.href='https://imakashi.top/'"><b>Akashi</b></a>
      <br>
      Powered by <a class="chameleon underline" onclick="window.location.href='https://typecho.org'"><b>Typecho</b></a></small>
      <br><br>
    </div>
      
    <script src="<?php $this->options->themeUrl('config/mdui/js/mdui.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('config/js/jquery.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('config/js/thememode.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('config/js/returntop.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('config/js/prism.highlight.js'); ?>"></script>

    <script src="<?php $this->options->themeUrl('config/js/jquery.fancybox.min.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $( ".fancybox").fancybox();
        });
    </script>

    <?php if (!empty($this->options->AKAROMfucset) && in_array('AKAROMindexloading', $this->options->AKAROMfucset)): ?>
    <script type="text/javascript" src="<?php $this->options->themeUrl('config/js/loading.js'); ?>"></script>
    <?php endif; ?>
    
    <script src="<?php $this->options->themeUrl('config/js/OwO.js'); ?>"></script>
    <script>
      function OwO_show() {
    if ($(".OwO-items").css("max-height") == '0px') {
        $(".OwO").addClass("OwO-open");
    } else {
       $(".OwO").removeClass("OwO-open");
    }
}
    </script>
<?php $this->footer(); ?>
</div>
</body>
</html>
