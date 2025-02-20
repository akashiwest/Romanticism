![主题图](https://mono.imakashi.eu.org/opensource/github-Romanticism2.1Screenshot.webp.webp)
# Romanticism(浪漫主义)
一款简洁的 typecho 主题

当前版本：V2.1

**“在明石的简洁设计中捕捉来自日常生活中的浪漫主义。”**

Demo: [明石博客](https://imakashi.eu.org/blog/)



## 特性

- 高度统一的明石设计风格，简洁明快、赏心悦目；

- 全局思源宋体，适合文字阅读；

- 无插件文章置顶样式；

- 代码高亮，为你的代码锦上添花；
  
- 原生自带图片灯箱，快让朋友们来欣赏你发的照片吧；

- 评论原生数字验证码，拒绝麦片哥评论；

- 评论原生可发送表情，为对话赋予灵魂；
 
- 手动深色模式，夜间阅读保护视力；

- 还有文章归档页、“短讯” 、Gravatar 头像、自带无插件友链页面、评论UA等等功能。

## 使用方法

- 支持 typecho 1.1及以上版本（1.1以下的版本我没测试过）
- 支持 Firefox Chrome Safari 等现代浏览器（当然不支持 IE）

在 Github 下载本主题压缩包，解压后确保文件夹名称为 "Romanticism", 将此文件夹放入主题目录中。

随后在后台/外观中启用 "Romanticism" 主题，在“设置外观”中自定义主题相关功能。

## 感谢

此主题的诞生离不开以下项目的帮助，特此感谢。

[MDUI 框架](https://www.mdui.org/) | [jQuery 库](https://github.com/jquery/jquery)

[OwO.js](https://github.com/DIYgod/OwO) | [谷歌思源宋体](https://fonts.google.com)

[Prismjs](https://prismjs.com/) | [Fancybox](https://fancyapps.com/docs/ui/fancybox/)

[Daydream 主题](https://github.com/Skywt2003/Daydream) | [失眠海峡](https://blog.imalan.cn/)

[Cuckoo 主题](https://github.com/bhaoo/cuckoo) | [MDx 主题](https://flyhigher.top/)

## 功能
 1. 设置文章归档页：请先创建一个空页面，在自定义模板中选择“文章归档页”，正文不必输入内容，设置此页面地址为 archivesbox.html （在标题的下面），然后再选择高级选项 -> 公开度 -> 隐藏；
 2. 设置友情链接页：请先创建一个空页面，在自定义模板中选择“友情链接页”，在正文中输入的内容格式如下：
 ```
 !!!
 [icon]博客的图标
 [link]博客的网址
 [name]博客的标题
 [desc]博客的简短描述
 [end]
 !!!
 ```
 以下是一个例子
 ```html
 !!!
 [icon]https://example.cn/avatar.png
 [link]https://example.cn/
 [name]Example blog
 [desc]A tecnology blog.
 [end]

 [icon]https://mono.imakashi.eu.org/overall/headicon2.webp
 [link]https://imakashi.eu.org/blog
 [name]明石博客
 [desc]一个互联网海洋中的小岛
 [end]
 !!!
 ```
 (如你的博客没有开启 Markdown 解析，请去掉开头与结尾的 “!!!”)
 
 3. 代码高亮格式：使用 ` ``` ` 包裹一段代码，并指定一种语言；
 4. 快速登录：点击侧边栏上你的头像以进入博客后台管理页面。
 
## 其他问题

 - “首页加载动画”功能由于是所有数据加载完成后才会消失，在某些复杂环境中如果你觉得加载时间太长，请尝试关闭此功能；
 - 受限于本人的技术，即使我已经进行检查与测试，也仍然会有存在 bug 的可能。如你发现了此主题存在的 bug 请给我留言，谢谢！ 

## 鼓励
喜欢此主题的话请**Star本项目**哦！这是对我最大的认可！

## 版权

Romanticism Version 2.1

![GitHub](https://mono.imakashi.eu.org/opensource/GPL3.svg)

Copyright©2021-2025 [Akashi](https://imakashi.eu.org), under GPL-3.0 License
