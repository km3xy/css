
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="jquery-1.10.2/jquery.min.js"></script>
    <script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 0px;
            background-color: #f7f7f7;
        }

        .custom-checkbox {
            display: inline-block;
            margin: 10px 10px 10px 0;
            font-size: 18px;
            color: #333;
        }

        .custom-checkbox input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 10px;
        }

        .ui-content {
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .clear-button, .random-button {
            font-size: 18px;
            color: #007BFF;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            cursor: pointer;
        }

        .clear-button:hover, .random-button:hover {
            text-decoration: underline;
        }
    </style>




代码中实现复选框换行


   <fieldset data-role="controlgroup" data-type="horizontal">
                <?php for($i=1; $i<=35; $i++): ?>
                    <label class="custom-checkbox">
                        <input type="checkbox" name="c[<?php echo $i; ?>]" value="<?php echo $i; ?>"><?php echo $i; ?>
                    </label>
                    <?php if($i % 6 == 0): ?>
                        <br><br>
                    <?php endif; ?>
                <?php endfor; ?>
   </fieldset>


这段 PHP 代码使用了 for 循环来生成 1 到 35 的复选框，并在每 6 个复选框后换行。具体功能如下：

1. <fieldset>：

使用 data-role="controlgroup" 和 data-type="horizontal" 可能表明该代码用于 jQuery Mobile 以创建水平排列的控件组。



2. for 循环：

for($i=1; $i<=35; $i++)：循环 35 次，从 1 到 35 依次生成复选框。



3. 生成复选框 (<input type="checkbox">)：

name="c[<?php echo $i; ?>]"：

复选框的 name 使用 c[i] 形式，如 c[1], c[2] 等，方便在 PHP 处理表单提交时以数组的方式接收选中的值。


value="<?php echo $i; ?>"：

复选框的 value 也是当前数字，提交表单时可以知道选中了哪些数字。


<?php echo $i; ?>：

在复选框后直接输出数字，方便用户看到。




4. 换行逻辑 (if ($i % 6 == 0))：

当 i 是 6 的倍数时（如 6, 12, 18...），插入 <br><br>，使布局换行，保证每行最多显示 6 个复选框。




代码效果：

每行显示 6 个复选框，第 7 个复选框自动换行。

复选框的 name 采用数组格式 c[i]，方便表单数据处理。


如果你希望实现更美观的布局，建议使用 CSS 控制 display: inline-block; 或 grid 而不是 <br> 换行。




复选框换行的代码在这部分：

<?php if($i % 6 == 0): ?>
    <br><br>
<?php endif; ?>

解释：

if($i % 6 == 0):

这个条件在 i 是 6 的倍数时成立，比如 6, 12, 18, 24, 30 等。

也就是说，每 6 个复选框之后，会执行 if 语句内的代码。


<br><br>:

这两个 <br> 标签会在 HTML 页面中插入两行换行符，使复选框从新的一行开始排列。



代码执行示例：

如果 $i = 6，代码会输出：

<input type="checkbox" name="c[6]" value="6">6
<br><br>

这会导致复选框在 6 之后换行。

如果 $i = 12，代码会输出：

<input type="checkbox" name="c[12]" value="12">12
<br><br>

又换行一次。

这样就保证了复选框每 6 个一行的排列。



  


