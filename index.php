<?php
function genTextarea($name, $value, $width, $height, $placeholder = '') {
    $html = "<textarea name='{$name}' " . "style='width:{$width}; height:{$height} ' ";
    if (isset($value) && !empty($value)) $html .= ">{$value}</textarea>";
    else if ('' != $placeholder) $html .= "placeholder='{$placeholder}'></textarea>";
    else $html .= "></textarea>";
    return $html;
}
function homepage() {
    $hostname = $_SERVER['HTTP_HOST'];
    $html = "<h2><a href = 'http://{$hostname}'>{$hostname}</a> lets you move information between computers using the any url you like.<h2/>";
    $html = $html . "<h3>How to use:<h3/>";
    $html = $html . "<h4>&emsp;1.Enter the ANY URL in browser and type or paste in what you want.<h4/>";
    $html = $html . "<h4>&emsp;2.On another computer or smartphone enter in the same URL to retrive the information.<h4/>";
    $html = $html . "<h3>Tips:<h3/>";
    $html = $html . "<h4>&emsp;For security the information in the {$hostname} url is destroyed as soon as it is read.<h4/>";
    $html = $html . "<h4>&emsp;Anyone visiting the same URL at a later time will not be able to see the message.<h4/>";
    $html = $html . "<h3>For Example:<h3/>";
    $html = $html . "<h4>&emsp;<a href='http://{$hostname}/example'>{$hostname}/example<a/><h4/>";
    return $html;
}

function footer() {

}

$url = $_SERVER["PATH_INFO"];
if ($url == "") echo homepage();
else {
    $file_path = "./file" . $url;
    $file_name = str_replace('/', '', $url);
    if (file_exists($file_path)) {
        $text_tmp = file($file_path);
        $text = "";
        foreach ($text_tmp as $line) $text = $text . $line;
        echo genTextarea("output", $text, "100%", "100%");
        unlink($file_path);
    } else {
        echo "<form action='./submit.php' method='post'><div>
                <textarea name='filename' style='display: none'>{$file_name}</textarea>";
        echo genTextarea("text", "Input something there, press \"Enter\" to submit.", "100%", "90%");
        echo "</div><div><input type='submit' value='submit''/></div></form>";
    }
}
?>
