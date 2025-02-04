优化后的完整代码

此版本针对提交按钮点击不灵敏的问题进行了优化，包括：

1. 改用 <button> 代替 <input type="submit">，避免 jQuery Mobile 的默认行为干扰。


2. 添加 data-role="none"，防止 jQuery Mobile 处理按钮样式和功能。


3. 手动绑定 click 事件触发表单提交，确保点击按钮时表单可以正常提交。


4. 提高 z-index 以防止按钮被其他元素遮挡。


5. 缩短按钮宽度，增加高度，提高点击区域。



