把 <div data-role="collapsible" data-collapsed="true"> 
    
    修改为 <div data-role="collapsible" data-collapsed="false">，这样折叠栏就会默认展开。
        
        修改后的代码如下：

<div data-role="collapsible" data-collapsed="false">
    <h3>前区选择（1-35）</h3>
    <div class="number-grid">
        <?php for ($i = 1; $i <= 35; $i++): ?>
            <div class="custom-checkbox">
                <input type="checkbox" id="frontNumber<?= $i ?>" data-role="none">
                <label for="frontNumber<?= $i ?>"><?= $i ?></label>
            </div>
        <?php endfor; ?>
    </div>
</div>

这样，页面加载时，折叠栏会默认是展开的。





        
