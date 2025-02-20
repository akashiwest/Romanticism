function updateIcon(filterValue) {
    const iconElement = document.querySelector('.akarom-articletag-index .mdui-icon');
    switch(filterValue) {
        case 'article':
            iconElement.textContent = 'blur_circular';
            break;
        case 'sms':
            iconElement.textContent = 'tonality';
            break;
        default:
            iconElement.textContent = 'panorama_fish_eye';
            break;
    }
}

// 默认过滤器
document.addEventListener('DOMContentLoaded', () => {
    const savedFilter = localStorage.getItem('articleFilter') || 'all';
    const filterElement = document.getElementById('filter' + savedFilter);
    if (filterElement) {
        filterElement.checked = true;
        updateIcon(savedFilter);
    }
});

document.querySelectorAll('input[name="filter"]').forEach(radio => {
    radio.addEventListener('change', (e) => {
        if (e.target.checked) {
            const filterValue = e.target.value;
            localStorage.setItem('articleFilter', filterValue);
            updateIcon(filterValue);
        }
    });
});