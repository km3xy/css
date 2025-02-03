<div data-role="page">
    <div data-role="header"></div>
    <div data-role="main" class="ui-content">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset data-role="controlgroup" data-type="horizontal">
                <label class="custom-checkbox">
                    <input type="checkbox" name="city" value="新版随机包含上期码，定胆随机+">点我触发事件哦
                </label>
            </fieldset>

            <h1>您选的后区定胆码是_______<span id="spanId">_____</span></h1>

            <h5>多态复选器，作者，行空天马</h5>
            
            <br>
            
            
            
            <legend>请选择后区您喜爱的号码：</legend>

            <fieldset data-role="controlgroup" data-type="horizontal">
                <?php for($i=1; $i<=12; $i++): ?>
                    <label class="custom-checkbox">
                        <input type="checkbox" name="c[<?php echo $i; ?>]" value="<?php echo $i; ?>"><?php echo $i; ?>
                    </label>
                    <?php if($i % 5 == 0): ?>
                        <br><br>
                    <?php endif; ?>
                <?php endfor; ?>
            </fieldset>

            <hr>
            <input type="submit" data-inline="true" value="提交开始">
            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="clear-button">清空返回还原</a>
            
            
                        <a href="#" class="random-button">随机选中包含上期码</a>
            
