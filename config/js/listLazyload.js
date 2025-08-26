const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {

    if (entry.isIntersecting) {
      const element = entry.target;
      const bgUrl = element.getAttribute('data-bg');
      
      if (bgUrl) {
        const img = new Image();
        img.onload = () => {
          element.style.backgroundImage = `url(${bgUrl})`;
        };
        img.src = bgUrl;
        observer.unobserve(element);
      }
    }
  });
}, {
  // 配置项
  rootMargin: '50px 0px',
  threshold: 0.01
});

const lazyLoadElements = document.querySelectorAll('.AKAROMlazyload');

lazyLoadElements.forEach(element => {
  observer.observe(element);
});

const styles = `
.AKAROMlazyload {
  background-color: Aquamarine;
}
`;

const styleSheet = document.createElement('style');
styleSheet.textContent = styles;
document.head.appendChild(styleSheet);