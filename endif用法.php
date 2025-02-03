
<?php endif; ?> 是 PHP 中的 替代语法（Alternative Syntax），主要用于控制结构（如 if、foreach、while 等）在 HTML 代码中的嵌套。

用于结束 if 代码块。
作用：      用于结束 if 代码块。

<?php endif; ?> 相当于普通 if 语句的 }，用于结束 if 代码块。

---
使用场景：
当你在 HTML 和 PHP 混合 编写时，使用 endif; 可以提高代码的可读性，尤其是嵌套 HTML 代码时。

示例

           <fieldset data-role="controlgroup" data-type="horizontal">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <label class="custom-checkbox">
                        <input type="checkbox" name="c[<?php echo $i; ?>]" value="<?php echo $i; ?>"><?php echo $i; ?>
                    </label>
                    <?php if ($i % 5 == 0): ?>
                        <br><br>
                    <?php endif; ?>
                <?php endfor; ?>
            </fieldset>
















