<?php
// POSTリクエストからIPアドレスを受け取る
$data = json_decode(file_get_contents('php://input'), true);

// IPアドレスが送信されているか確認
if (isset($data['ip_address'])) {
    $user_ip = $data['ip_address'];

    // 保存するデータを準備
    $user_data = [
        'ip_address' => $user_ip,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // JSON形式でファイルに保存
    $json_data = json_encode($user_data, JSON_PRETTY_PRINT);
    file_put_contents('user_ips.json', $json_data . PHP_EOL, FILE_APPEND);

    // 成功メッセージを返す
    echo json_encode(['status' => 'success', 'message' => 'IPアドレスが保存されました']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'IPアドレスが見つかりません']);
}
?>
