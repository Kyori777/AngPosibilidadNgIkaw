<?php
define('SUPABASE_URL', 'https://qgtscfovmqrlqlfbaijy.supabase.co');
define('SUPABASE_API_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InFndHNjZm92bXFybHFsZmJhaWp5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDg0OTgzNzEsImV4cCI6MjA2NDA3NDM3MX0.RnrY9mUA21Rv4XoA4md2qsCqBpTFkpe51OX1lZ8vLWY');

function supabase_request($endpoint, $method = 'GET', $data = null) {
    $url = SUPABASE_URL . $endpoint;
    $headers = [
        'Content-Type: application/json',
        'apikey: ' . SUPABASE_API_KEY,
        'Authorization: Bearer ' . SUPABASE_API_KEY
    ];

    $opts = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers
    ];

    if ($data) {
        $opts[CURLOPT_POSTFIELDS] = json_encode($data);
    }

    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}
