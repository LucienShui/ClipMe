<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 17:31
 */
$url = '';
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    session_start();
    $_SESSION['keyword'] = $keyword;
    $url = $keyword;
}
header("Refresh:0;url=/" . $url);
?>
