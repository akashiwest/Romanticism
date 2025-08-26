$(document).ready(function() {
    function updateAvatar() {
        let $mail = $('#mail');
        let $avatar = $('#preheadicon');

        if ($mail.length && $avatar.length) {
            let email = $mail.val().trim().toLowerCase();
            if (email) {
                let hash = md5(email);
                $avatar.attr('src', `https://cravatar.cn/avatar/${hash}.png`);
            }
        }
    }

    updateAvatar(); // 确保页面加载后执行一次

    $('#mail').on('blur', updateAvatar);
});
