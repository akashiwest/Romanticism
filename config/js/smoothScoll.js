(function() {
      let scrollCurrent = window.scrollY || 0;
      let velocity = 0;
      let isAnimating = false;
      const friction = 0.95;
      const accelerationFactor = 0.05;

      function animate() {
        velocity *= friction;
        
        // 计算新的滚动位置
        const newScrollPosition = scrollCurrent + velocity;
        
        // 获取文档最大可滚动高度
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        
        // 边界检查
        if (newScrollPosition <= 0) {
          scrollCurrent = 0;
          velocity *= 0.5; // 触顶时快速减速
        } else if (newScrollPosition >= maxScroll) {
          scrollCurrent = maxScroll;
          velocity *= 0.5; // 触底时快速减速
        } else {
          scrollCurrent = newScrollPosition;
        }

        window.scrollTo(0, scrollCurrent);

        // 当速度足够小或触及边界时停止动画
        if (Math.abs(velocity) > 0.5 && scrollCurrent > 0 && scrollCurrent < maxScroll) {
          requestAnimationFrame(animate);
        } else {
          isAnimating = false;
        }
      }

      window.addEventListener('wheel', function(e) {
        e.preventDefault();
        
        let delta = e.deltaY;
        if (e.deltaMode === 1) {
          delta *= 33;
        } else if (e.deltaMode === 2) {
          delta *= window.innerHeight;
        }

        // 获取当前滚动位置和最大滚动位置
        const currentScroll = window.scrollY;
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;

        // 在边界处减小加速度
        if ((currentScroll <= 0 && delta < 0) || (currentScroll >= maxScroll && delta > 0)) {
          delta *= 0.3; // 在边界处降低滚动速度
        }

        velocity += delta * accelerationFactor;

        if (!isAnimating) {
          isAnimating = true;
          requestAnimationFrame(animate);
        }
      }, { passive: false });
    })();