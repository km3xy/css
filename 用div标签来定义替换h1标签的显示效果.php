<style>
    .h1-style {
        font-size: 32px; /* h1 默认字体大小 */
        font-weight: bold; /* 加粗 */
        color: black; /* 颜色 */
       // text-align: center; /* 居中 */
        margin: 20px 0; /* 上下间距 */
    }
</style>

<div class="h1-style">
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$a3 = $_POST['c'];
if (!is_null($a3)) {
    echo "已选号码：";

    $aa4 = array(
        "1" => "1", "2" => "2", "3" => "3", "4" => "4", 
        "5" => "5", "6" => "6", "7" => "7", "8" => "8", 
        "9" => "9", "10" => "10", "11" => "11", "12" => "12"
    );

    try {
        $nx4 = mt_rand(1, 2);
        $bn4 = array_rand($aa4, $nx4);

        $nx2 = array_rand($aa4, 2);
        $nx1 = array_rand($aa4, 1);

        $arr2 = $_POST['c'];
        $join2 = join(" ", $arr2);
        echo $join2 . "<br>";

        $b1 = mt_rand(1, 2);

        if (count($arr2) < $b1) {
            throw new Exception("选中的数组数量不足以随机选择 $b1 个元素，请重新选择！");
        }

        $array_name = array_rand($arr2, $b1);

        echo "随一模式<br>";

        if ($b1 == 1) {
            print_r($array_name);
            print_r("+");
            print_r($nx1);
        } 

        echo "<br>随二模式<br>";

        if ($b1 == 2) {
            $join22 = join("+", $array_name);
            echo $join22 . "<br>";
            print_r("+");
            $nx22 = join("+", $nx2);
            echo $nx22 . "<br>";
        }

    } catch (Exception $e) {
        echo "选中的号码少于随机选择的数量，请选择更多号码。<br>";
    }

    echo "<br>";
}
?>
</div>


可以用div标签来定义替代h1标签的显示效果，


<h1>    <？php    echo   "h1标签显示效果默认字体大小32px"; ?>  </>
