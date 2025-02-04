<style>
    .h1-style {
        font-size: 20px;
        font-weight: bold;
        color: black;
        margin: 20px 0;
    }
    .result {
        margin-top: 10px; /* 增加模式与已选号码的间距 */
    }
</style>

<div class="h1-style">
<?php
if (!empty($_POST['c'])) {
    $selectedNumbers = $_POST['c'];
    $randomPool = range(1, 35);
    $randomMode = mt_rand(1, 5);

    echo "<p>已选号码: " . implode("+", $selectedNumbers) . "</p>"; // 增加间距

    if (count($selectedNumbers) < $randomMode) {
        echo "<p>选中的号码少于随机选择的数量，请选择更多号码。</p>";
        exit;
    }

    // 选择指定数量的选中号码
    $randomIndexes = array_rand($selectedNumbers, $randomMode);
    $randomIndexes = is_array($randomIndexes) ? $randomIndexes : [$randomIndexes];
    $randomSelection = array_intersect_key($selectedNumbers, array_flip($randomIndexes));

    // 计算补充的随机数（保证最终位数正确）
    $additionalCount = ($randomMode < 5) ? (6 - count($randomSelection)) : 0;
    $additionalNumbers = ($additionalCount > 0) ? array_rand(array_flip($randomPool), $additionalCount) : [];

    // 生成最终号码
    $finalSelection = array_merge($randomSelection, (array) $additionalNumbers);
    sort($finalSelection);

    // 显示模式名称
    $modeNames = [
        1 => "随一模式",
        2 => "随二模式",
        3 => "随三模式",
        4 => "随四模式",
        5 => "随五模式"
    ];

    echo "<p class='result'>{$modeNames[$randomMode]}</p>";
    echo "<p>" . implode("+", $finalSelection) . "</p>";
}
?>
</div>


这段 PHP 代码的主要功能是从用户选中的号码中随机选择一定数量的号码，并在必要时补充额外的随机号码，以确保最终的号码组合符合特定的数量规则。下面是代码的实现过程解析：


---

1. 处理用户提交的数据

if (!empty($_POST['c'])) {
    $selectedNumbers = $_POST['c'];

代码检查 $_POST['c'] 是否为空，确保用户提交了选中的号码。

$_POST['c'] 是一个数组，包含用户选中的号码。



---

2. 生成随机选择模式

$randomPool = range(1, 35);
$randomMode = mt_rand(1, 5);

range(1, 35) 生成一个包含 1 到 35 的数组，作为随机数池，用于补充号码。

mt_rand(1, 5) 生成一个 1 到 5 之间的随机整数，表示随机选择模式：

随一模式（随机选 1 个）

随二模式（随机选 2 个）

随三模式（随机选 3 个）

随四模式（随机选 4 个）

随五模式（随机选 5 个）




---

3. 输出用户已选号码

echo "<p>已选号码: " . implode("+", $selectedNumbers) . "</p>";

implode("+", $selectedNumbers) 将选中的号码用 + 连接，并输出，例如：

已选号码: 3+7+Y+22+30



---

4. 判断选中的号码是否足够

if (count($selectedNumbers) < $randomMode) {
    echo "<p>选中的号码少于随机选择的数量，请选择更多号码。</p>";
    exit;
}

如果用户选中的号码总数 少于 生成的 $randomMode，就提示用户 “选中的号码少于随机选择的数量”，并终止程序执行。



---

5. 从用户选中的号码中随机选择

$randomIndexes = array_rand($selectedNumbers, $randomMode);
$randomIndexes = is_array($randomIndexes) ? $randomIndexes : [$randomIndexes];
$randomSelection = array_intersect_key($selectedNumbers, array_flip($randomIndexes));

array_rand($selectedNumbers, $randomMode) 从用户选中的号码中随机挑选 $randomMode 个索引。

如果 $randomIndexes 不是数组（当 $randomMode == 1 时，返回单个值），转换为数组。

array_intersect_key($selectedNumbers, array_flip($randomIndexes)) 根据索引提取选中的号码。


例如： 用户选中的号码是 [3, 7, Y, 22, 30]，如果 随机模式 = 3，则可能选出 [3, 15, 30]。


---

6. 计算需要补充的随机数

$additionalCount = ($randomMode < 5) ? (6 - count($randomSelection)) : 0;
$additionalNumbers = ($additionalCount > 0) ? array_rand(array_flip($randomPool), $additionalCount) : [];

如果 $randomMode < 5（即 未达到6个号码），需要补足 6 个号码。

array_rand(array_flip($randomPool), $additionalCount) 从 1-35 的号码池中随机选择 $additionalCount 个号码。



---

7. 生成最终的号码

$finalSelection = array_merge($randomSelection, (array) $additionalNumbers);
sort($finalSelection);

合并 用户选中的随机号码 和 补充的随机号码，确保最终号码数量正确。

sort($finalSelection) 对最终号码进行升序排序。


例如：

选中的号码 [3, Y, 30]

需要补充 3 个号码 [5, 12, X]

最终结果 [3, 5, 12, Y, X, 30]



---

8. 输出模式名称

$modeNames = [
    1 => "随一模式",
    2 => "随二模式",
    3 => "随三模式",
    4 => "随四模式",
    5 => "随五模式"
];

echo "<p class='result'>{$modeNames[$randomMode]}</p>";

根据 $randomMode，输出对应的 随机模式名称。

例如，如果 随机模式 = 3，则输出：

随三模式



---

9. 输出最终号码

echo "<p>" . implode("+", $finalSelection) . "</p>";

最终的号码用 + 连接并输出，例如：

3+5+12+Y+X+30



---

总结

整体流程如下：

1. 获取用户提交的号码


2. 生成随机模式（1~5）


3. 判断选中号码是否足够


4. 从用户选中号码中随机选出部分


5. 如果不足6个，则补充随机号码


6. 输出模式名称


7. 输出最终的号码



这段代码的逻辑比较清晰，适用于 基于用户选择+随机补充的选号系统。你可以修改 $randomMode 的规则，或者调整号码池范围，让它适应不同的选号需求。



这段 PHP 代码的主要功能是从用户选中的号码中随机选择一定数量的号码，并在必要时补充额外的随机号码，以确保最终的号码组合符合特定的数量规则。下面是代码的实现过程解析：


---

1. 处理用户提交的数据

if (!empty($_POST['c'])) {
    $selectedNumbers = $_POST['c'];

代码检查 $_POST['c'] 是否为空，确保用户提交了选中的号码。

$_POST['c'] 是一个数组，包含用户选中的号码。



---

2. 生成随机选择模式

$randomPool = range(1, 35);
$randomMode = mt_rand(1, 5);

range(1, 35) 生成一个包含 1 到 35 的数组，作为随机数池，用于补充号码。

mt_rand(1, 5) 生成一个 1 到 5 之间的随机整数，表示随机选择模式：

随一模式（随机选 1 个）

随二模式（随机选 2 个）

随三模式（随机选 3 个）

随四模式（随机选 4 个）

随五模式（随机选 5 个）




---

3. 输出用户已选号码

echo "<p>已选号码: " . implode("+", $selectedNumbers) . "</p>";

implode("+", $selectedNumbers) 将选中的号码用 + 连接，并输出，例如：

已选号码: 3+7+Y+22+30



---

4. 判断选中的号码是否足够

if (count($selectedNumbers) < $randomMode) {
    echo "<p>选中的号码少于随机选择的数量，请选择更多号码。</p>";
    exit;
}

如果用户选中的号码总数 少于 生成的 $randomMode，就提示用户 “选中的号码少于随机选择的数量”，并终止程序执行。



---

5. 从用户选中的号码中随机选择

$randomIndexes = array_rand($selectedNumbers, $randomMode);
$randomIndexes = is_array($randomIndexes) ? $randomIndexes : [$randomIndexes];
$randomSelection = array_intersect_key($selectedNumbers, array_flip($randomIndexes));

array_rand($selectedNumbers, $randomMode) 从用户选中的号码中随机挑选 $randomMode 个索引。

如果 $randomIndexes 不是数组（当 $randomMode == 1 时，返回单个值），转换为数组。

array_intersect_key($selectedNumbers, array_flip($randomIndexes)) 根据索引提取选中的号码。


例如： 用户选中的号码是 [3, 7, Y, 22, 30]，如果 随机模式 = 3，则可能选出 [3, 15, 30]。


---

6. 计算需要补充的随机数

$additionalCount = ($randomMode < 5) ? (6 - count($randomSelection)) : 0;
$additionalNumbers = ($additionalCount > 0) ? array_rand(array_flip($randomPool), $additionalCount) : [];

如果 $randomMode < 5（即 未达到6个号码），需要补足 6 个号码。

array_rand(array_flip($randomPool), $additionalCount) 从 1-35 的号码池中随机选择 $additionalCount 个号码。



---

7. 生成最终的号码

$finalSelection = array_merge($randomSelection, (array) $additionalNumbers);
sort($finalSelection);

合并 用户选中的随机号码 和 补充的随机号码，确保最终号码数量正确。

sort($finalSelection) 对最终号码进行升序排序。


例如：

选中的号码 [3, Y, 30]

需要补充 3 个号码 [5, 12, X]

最终结果 [3, 5, 12, Y, X, 30]



---

8. 输出模式名称

$modeNames = [
    1 => "随一模式",
    2 => "随二模式",
    3 => "随三模式",
    4 => "随四模式",
    5 => "随五模式"
];

echo "<p class='result'>{$modeNames[$randomMode]}</p>";

根据 $randomMode，输出对应的 随机模式名称。

例如，如果 随机模式 = 3，则输出：

随三模式



---

9. 输出最终号码

echo "<p>" . implode("+", $finalSelection) . "</p>";

最终的号码用 + 连接并输出，例如：

3+5+12+Y+X+30



---

总结

整体流程如下：

1. 获取用户提交的号码


2. 生成随机模式（1~5）


3. 判断选中号码是否足够


4. 从用户选中号码中随机选出部分


5. 如果不足6个，则补充随机号码


6. 输出模式名称


7. 输出最终的号码



这段代码的逻辑比较清晰，适用于 基于用户选择+随机补充的选号系统。你可以修改 $randomMode 的规则，或者调整号码池范围，让它适应不同的选号需求。








