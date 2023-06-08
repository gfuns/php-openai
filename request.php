<?php
require __DIR__ . '/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;
$open_ai = new OpenAi('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');
// get prompt parameter
$prompt = $_GET['prompt'];
// set api data
$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => $prompt,
    'temperature' => 0.7,
    'max_tokens' => 256,
    'top_p' => 1,
    'frequency_penalty' => 0,
    'presence_penalty' => 0,
    'stream' => true,
], function ($curl_info, $data) {
    // now we will get stream data
    echo $data;
    echo PHP_EOL; // used to find the newline character in a cross-platform-compatible way
    ob_flush(); //outputs the contents of the topmost output buffer and then clears the buffer of the contents
    flush(); //requests the server to send its currently buffered output to the browser
    return strlen($data);
});
