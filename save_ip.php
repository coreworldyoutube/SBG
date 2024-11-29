<?php
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['ip_address'])) {
    $user_ip = $data['ip_address'];
    $user_data = [
        'ip_address' => $user_ip,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // 既存のデータを読み込み
    $existing_data = file_exists('user_ips.json') ? json_decode(file_get_contents('user_ips.json'), true) : [];

    // 新しいIPアドレスを追加
    $existing_data[] = $user_data;

    // JSONにして保存
    file_put_contents('user_ips.json', json_encode($existing_data, JSON_PRETTY_PRINT));

    echo json_encode(['status' => 'success', 'message' => 'IPアドレスが保存されました']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'IPアドレスが見つかりません']);
}
?>
