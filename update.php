<?php

header('Content-Type: application/json; charset=utf-8');

function checkThemeUpdate()
{
    $api_url = 'https://versioncheck.imakashi.com/?themeRomanticism';
    $response = @file_get_contents($api_url);
    if ($response === FALSE) {
        return json_encode(["error" => "无法连接到更新服务器"]);
    }

    $data = json_decode($response, true);
    if (!isset($data['version'])) {
        return json_encode(["error" => "无效的更新数据"]);
    }

    // 返回更新数据
    return json_encode([
        "current_version" => '2.2',
        "latest_version" => $data['version'],
        "update_url" => $data['url'],
        "feature" => $data['feature']
    ]);
}

echo checkThemeUpdate();

?>
