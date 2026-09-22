<?php
// 临时脚本：用来生成测试账号的密码哈希值
// 跑完之后把输出的字符串复制到 setup.sql 里，再删掉这个文件
 
echo password_hash('123456', PASSWORD_DEFAULT);
?>