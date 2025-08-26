//Loading页面
document.onreadystatechange = function () {
  if (document.readyState == "complete") {
    loadingFade();
  }
}

// 添加计时器，若加载时间过长，显示取消按钮
let loadingTimer;
document.addEventListener('DOMContentLoaded', function() {
  const cancelBtn = document.getElementById('cancelLoadingBtn');
  if (cancelBtn) {
    // 3秒后显示取消按钮
    loadingTimer = setTimeout(function() {
      cancelBtn.style.opacity = '0.6';
      cancelBtn.style.filter = 'blur(0)';
    }, 3000);
    
    // 添加点击事件
    cancelBtn.addEventListener('click', function() {
      loadingFade();
      clearTimeout(loadingTimer);
      mdui.snackbar({
          message: '资源将在后台加载 ...',
          position: 'right-bottom',
      });
    });
  }
});

function loadingFade() {
  var opacity = 1;
  var fadeSpeed = 0.05; // 渐变速度
  var loadingBackground = document.getElementById('loading_bg');
  var loadingBox = document.getElementById('loading');
  
  if (!loadingBackground || !loadingBox) {
    return;
  }
  
  // 清除计时器
  clearTimeout(loadingTimer);
  
  function fade() {
    if (opacity <= 0) {
      $('#loading').remove();
      return;
    }
    loadingBackground.style.opacity = opacity;
    loadingBox.style.opacity = opacity;
    opacity -= fadeSpeed;
    requestAnimationFrame(fade); // 使用requestAnimationFrame来提高动画性能
  }
  
  fade();
}