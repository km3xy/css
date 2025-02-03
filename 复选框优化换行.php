https://github.com/xiaowu-ai-crypto/better_used_GPT/commits?author=xiaowu-ai-crypto




<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="jquery-1.10.2/jquery.min.js"></script>
    <script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>

    <style>
        .number-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 5px;
            margin: 10px 0;
        }

        .custom-checkbox {
            text-align: center;
        }

        .custom-checkbox input {
            display: none;
        }

        .custom-checkbox label {
            display: block;
            width: 100%;
            height: 40px;
            line-height: 40px;
            background: #f0f0f0;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid #ccc;
        }

        .custom-checkbox input:checked + label {
            background: #ff6666;
            color: white;
            border-color: #ff6666;
            font-weight: bold;
        }

        #output {
            white-space: pre-wrap;
            background: #f8f8f8;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }

        .button-group button {
            width: 48%;
        }
    </style>
</head>

<body>
    <div data-role="page">
        <div data-role="header">
            <h1>大乐透智能选号助手 - 后区</h1>
        </div>

        <div role="main" class="ui-content">
            <div data-role="collapsible" data-collapsed="false">
                <h3>后区选择（1-12）</h3>
                <div class="number-grid">
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="backNumber<?= $i ?>" data-role="none">
                            <label for="backNumber<?= $i ?>"><?= $i ?></label>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="button-group">
                <button onclick="randomSelectBack()" class="ui-btn ui-corner-all ui-btn-b">随机后区</button>
                <button onclick="clearSelection()" class="ui-btn ui-corner-all ui-btn-c">清除选号</button>
            </div>
            <div class="button-group">
                <button onclick="selectRandomNumbers()" class="ui-btn ui-corner-all ui-btn-a">生成号码</button>
                <button onclick="deleteLastResult()" class="ui-btn ui-corner-all ui-btn-d">删除结果</button>
            </div>

            <div id="output"></div>
        </div>
    </div>









. 优化换行

你使用 if($i % 5 == 0): ?><br><br><?php endif; 让复选框换行。

但 <br><br> 可能会影响布局，推荐使用 CSS grid 或 flexbox 控制换行。

---

最终优化代码

<fieldset data-role="controlgroup" data-type="horizontal" class="number-grid">
    <?php for ($i = 1; $i <= 12; $i++): ?>
        <label class="custom-checkbox">
            <input type="checkbox" name="c[]" value="<?= $i ?>" id="backNumber<?= $i ?>" data-role="none">
            <?= $i ?>
        </label>
    <?php endfor; ?>
</fieldset>


---


<fieldset data-role="controlgroup" data-type="horizontal" class="number-grid">

配合 CSS

.number-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 5px;
}

这样可以保证每行 6 个复选框，自动换行，而不需要 <br><br>。



---

结论

你原来的方法可以使用 <fieldset> 进行定义，但如果要换行，建议使用 CSS grid 来实现，而不是 <br><br>。这样代码更简洁，适配性也更好。


<fieldset data-role="controlgroup" data-type="horizontal" class="number-grid">
