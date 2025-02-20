//Loading页面
document.onreadystatechange = function () {
    if (document.readyState == "complete") {
        loadingFade();
    }
}

function loadingFade() {
    var opacity = 1;
    var fadeSpeed = 0.05; // 渐变速度
    var loadingBackground = document.getElementById('loading_bg');
    var loadingBox = document.getElementById('loading');

    if (!loadingBackground || !loadingBox) {
        return;
    }

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
