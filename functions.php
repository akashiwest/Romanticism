<?php
/**

    _    _  __    _    ____  _   _ ___ 
   / \  | |/ /   / \  / ___|| | | |_ _|
  / _ \ | ' /   / _ \ \___ \| |_| || | 
 / ___ \| . \  / ___ \ ___) |  _  || | 
/_/   \_\_|\_\/_/   \_\____/|_| |_|___|

 * [Romanticism]
 * functions.php 主题基本配置文件
 * @version 2.0
**/

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {  //后台设置界面
?>
    <h2>主题设置 - Romanticism</h2>

    <p>请前往Typecho自带的设置界面来设置博客名称与描述。</p>
    <?php
    $AKAROMlogoUrl = new Typecho_Widget_Helper_Form_Element_Text('AKAROMlogoUrl', NULL, NULL, _t('设置您的头像'), _t('在这里填入一个图片 URL 地址，将会显示在侧边栏上部。'));
    $form->addInput($AKAROMlogoUrl);

    $AKAROMindeximg = new Typecho_Widget_Helper_Form_Element_Text('AKAROMindeximg', NULL, NULL, _t('设置首页主题图'), _t('在这里填入一个图片 URL 地址。'));
    $form->addInput($AKAROMindeximg);

    $AKAROMsidebarimg = new Typecho_Widget_Helper_Form_Element_Text('AKAROMsidebarimg', NULL, NULL, _t('设置侧边栏顶图'), _t('在这里填入一个图片 URL 地址，将会显示在侧边栏上部。'));
    $form->addInput($AKAROMsidebarimg);

    $AKAROMsign = new Typecho_Widget_Helper_Form_Element_Text('AKAROMsign', NULL, NULL, _t('设置网站图标'), _t('在这里填入一个图片 URL 地址，将会显示在浏览器标签栏。'));
    $form->addInput($AKAROMsign);

    $AKAROMinfobox = new Typecho_Widget_Helper_Form_Element_Text('AKAROMinfobox', NULL, NULL, _t('设置公告'), _t('输入一些公告或通知，将会显示在首页。'));
    $form->addInput($AKAROMinfobox);

    $AKAROMLinksterms = new Typecho_Widget_Helper_Form_Element_Textarea('AKAROMLinksterms', NULL, NULL, _t('设置交换友情链接的要求'), _t('此段文字将会显示在“友情链接页”；<br>您可以填入例如 <b>1.不接受违法站点；2.先友后链</b> 等信息。<br><b>注意：</b>请先创建一个空页面，在自定义模板中选择“友情链接页”。'));
    $form->addInput($AKAROMLinksterms);

    $AKAROMfootericp = new Typecho_Widget_Helper_Form_Element_Text('AKAROMfootericp', NULL, NULL, _t('设置页脚备案信息'), _t('此处填入的信息将会显示在页脚备案信息区，请依据博客情况填写。不填则不显示备案信息。可以使用 HTML 标签'));
    $form->addInput($AKAROMfootericp);

    $AKAROMfucset = new Typecho_Widget_Helper_Form_Element_Checkbox('AKAROMfucset', 
    array('AKAROMindexloading' => _t('开启此选项将会在站点加载时显示加载动画。')),
    array('AKAROMindexloading'), _t('首页加载动画'));
    
    $form->addInput($AKAROMfucset->multiMode());
}

function themeFields($layout) { //文章自定义字段功能
    $AKAROMarticleimg = new Typecho_Widget_Helper_Form_Element_Text('AKAROMarticleimg', NULL, NULL, _t('设置文章头图'), _t('在这里填入一个图片 URL 地址。'));
    $layout->addItem($AKAROMarticleimg);

    $AKAROMarticleCopyright = new Typecho_Widget_Helper_Form_Element_Select('AKAROMarticleCopyright', array(
        'SA' => 'CC BY-NC-SA 版权协议',
        'ND' => 'CC BY-NC-ND 版权协议',
        'BAN' => '禁止转载',
        'hide' => '不显示'
    ), 'show', _t('版权声明'), _t('将会在文章底部显示版权声明。选择你需要的版权种类'));
    $layout->addItem($AKAROMarticleCopyright);

    $AKAROMarticleSMS = new Typecho_Widget_Helper_Form_Element_Select('AKAROMarticleSMS', array(
        'default' => '长文章（默认）',
        'sms' => '短讯'
    ), 'show', _t('文章类型'), _t('当设置为 “短讯” 后则在首页拥有一个不一样的外观，适合一小段文字与单图片'));
    $layout->addItem($AKAROMarticleSMS);

    $AKAROMarticlecolor = new Typecho_Widget_Helper_Form_Element_Text('AKAROMarticlecolor', NULL, NULL, _t('设置文章头图底色'), _t('当没有文章头图时设置此项使样式美观。请填入英文或 RGB 颜色名。<br><br><b>明石精选低饱和度颜色</b><br>LightCyan - 青色<br>Lavender - 淡紫色<br>OldLace - 黄灰白色<br>MistyRose - 浅玫瑰色'));
    $layout->addItem($AKAROMarticlecolor);
}

function themeInit($comment) { //验证码相关功能，勿删
    $comment = AKAROM_simple_captcha($comment, $post, $result);
}

function Fancybox($content){ //Fancybox图片灯箱功能
    //以下参考自 Skywt 开发的 Daydream 主题（https://github.com/Skywt2003/Daydream），感谢大佬。
    $content = preg_replace("/<img src=\"([^\"]*)\" alt=\"([^\"]*)\" title=\"([^\"]*)\">/i", "<a data-fancybox=\"gallery\" href=\"\\1\" data-caption=\"\\3\"><img class=\"yuan\" src=\"\\1\" alt=\"\\2\" title=\"\\3\"></a>", $content);
    return $content;
}

function AKAROM_simple_captcha_math() { //评论区简单验证码
    $num1 = rand(1, 15);
    $num2 = rand(1, 15);
    echo "
    <div class=\"mdui-textfield\">
                    <i class=\"mdui-icon material-icons\">beach_access</i>
                    <input class=\"mdui-textfield-input\" type=\"text\" name=\"sum\" id=\"sum\" placeholder=\"$num1 + $num2 = ?\" required/>
                    <div class=\"mdui-textfield-error\">验证码不能为空</div>
                  </div>
    
    ";
    echo "<input type=\"hidden\" name=\"num1\" value=\"$num1\">\n";
    echo "<input type=\"hidden\" name=\"num2\" value=\"$num2\">";
}

function AKAROM_simple_captcha($comment, $post, $result) { //验证码判断
    if ($_REQUEST['text'] != null) {
        If($_POST['num1'] == null || $_POST['num2'] == null) {
            throw new Typecho_Widget_Exception(_t('验证码异常，请重试', '评论失败'));
        } else {
            $sum = $_POST['sum'];
            switch ($sum) {
            case $_POST['num1'] + $_POST['num2'] : break;
            case null:
                throw new Typecho_Widget_Exception(_t('请输入验证码，请重试', '评论失败'));
                break;
            default:
                throw new Typecho_Widget_Exception(_t('验证码错误，请重试', '评论失败'));
            }
        }
    }
    return $comment;
    }



function get_post_view($archive){ //统计文章浏览次数
	$cid    = $archive->cid;
	$db     = Typecho_Db::get();
	$prefix = $db->getPrefix();
	if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
		$db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
		echo 0;
		return;
	}
	$row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
	if ($archive->is('single')) {
      $views = Typecho_Cookie::get('extend_contents_views');
		if(empty($views)){
			$views = array();
		}else{
			$views = explode(',', $views);
		}
    if(!in_array($cid,$views)){
	   $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
       array_push($views, $cid);
			$views = implode(',', $views);
			Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
		}
	}
	echo $row['views'];
}
?>





<?php
//获取浏览器信息
function getBrowser($agent)
{
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $outputer = '&nbsp;<i class="iconfont icon-Sougou_Browser comment-ua" mdui-tooltip="{content: \'IE\'}"></i>';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
      $str1 = explode('Firefox/', $regs[0]);
$FireFox_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-firefox comment-ua" mdui-tooltip="{content: \'Firefox\'}"></i>';
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
      $str1 = explode('Maxthon/', $agent);
$Maxthon_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-edge comment-ua" mdui-tooltip="{content: \'Edge\'}"></i>';
    } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
$outputer = '&nbsp;<i class="iconfont icon-Sougou_Browser comment-ua" mdui-tooltip="{content: \'360浏览器\'}"></i>';
    } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Edge/', $regs[0]);
$Edge_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-edge comment-ua" mdui-tooltip="{content: \'Edge\'}"></i>';
    } else if (preg_match('/UC/i', $agent)) {
              $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-Sougou_Browser comment-ua" mdui-tooltip="{content: \'UC浏览器\'}"></i>';
    }  else if (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
                  $str1 = explode('rowser/',  $agent);
$QQ_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-QQBrowser comment-ua" mdui-tooltip="{content: \'QQ\'}"></i>';
    } else if (preg_match('/UBrowser/i', $agent, $regs)) {
              $str1 = explode('rowser/',  $agent);
$UCBrowser_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-Sougou_Browser comment-ua" mdui-tooltip="{content: \'UC浏览器\'}"></i>';
    }  else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $outputer = '&nbsp;<i class="iconfont icon-Sougou_Browser comment-ua" mdui-tooltip="{content: \'Opera\'}"></i>';
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
$str1 = explode('Chrome/', $agent);
$chrome_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-chrome comment-ua" mdui-tooltip="{content: \'Chrome\'}"></i>';
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
         $str1 = explode('Version/',  $agent);
$safari_vern = explode('.', $str1[1]);
        $outputer = '&nbsp;<i class="iconfont icon-safari comment-ua" mdui-tooltip="{content: \'Safari\'}"></i>';
    } else{
        $outputer = '&nbsp;<i class="iconfont icon-chrome comment-ua" mdui-tooltip="{content: \'Chrome\'}"></i>';
    }
    echo $outputer;
}

// 获取操作系统信息
function getOs($agent)
{
    $os = false;
 
    if (preg_match('/win/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class="iconfont icon-windows comment-ua" mdui-tooltip="{content: \'Windows\'}"></i>';
    } else if (preg_match('/android/i', $agent)) {
            $os = '&nbsp;&nbsp;<i class="iconfont icon-android comment-ua" mdui-tooltip="{content: \'Android\'}"></i>';
     }else if (preg_match('/ubuntu/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="iconfont icon-linux comment-ua" mdui-tooltip="{content: \'Ubuntu\'}"></i>';
    } else if (preg_match('/linux/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="iconfont icon-linux comment-ua" mdui-tooltip="{content: \'Linux\'}"></i>';
    } else if (preg_match('/iPhone/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="iconfont icon-ios comment-ua" mdui-tooltip="{content: \'iOS\'}"></i>';
    } else if (preg_match('/mac/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="iconfont icon-ios comment-ua" mdui-tooltip="{content: \'macOS\'}"></i>';
    }else if (preg_match('/fusion/i', $agent)) {
        $os = '&nbsp;&nbsp;<i class="iconfont icon-linux comment-ua" mdui-tooltip="{content: \'fusion\'}"></i>';
    } else {
        $os = '&nbsp;&nbsp;<i class="iconfont icon-linux comment-ua" mdui-tooltip="{content: \'Other Os\'}"></i>';
    }
    echo $os;
}
?>