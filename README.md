## Grace\Easy

## 框架说明


文档系统

规则
无限分级
目录名为chr
文件名要去掉前面的数字+横线
文件名为articlechr
文件第一行为标题
@linkkey 后面为关键词,可以被链接
@key 后面为关键词 可以被索引

显示的时候@这一行数据隐藏
@title 标题
@description 描述
@auth 作者
@editor 编辑
@linkkey 被链接关键词
@key 被索引


@testtitle 后面的是试题
@testtitle 后面的是试题



第二行为简述
第三行@editor 为作者
>tests 后面为试题





//===============================
后台有地方为目录名和标题做chr到中文的映射

地址 : home / path / childpath / file 来定位文件

home 定位主路径
home / path1 定位子路径
home / path1 / path2 定位子路径
home / path1 / path2 / file 来定位文件

最后一级可以选择一页显示还是分开显示
树形结构,所以得位置可以在树里面查询到


显示模式
知识 / 习题 / 考试 / 查询

后台根据文件中的内容,整理出所有的linkkey 和 key 进行索引

存储路径为 info目录 [ 建立资料库的时候排除 ]
index.json
linkkey.json
key.json

目录下的index.json 对该目录的情况进行说明
包括
    标题
    描述
    是否最终目录

同时系统对立面的信息进行重写
包括
    pathinfo
    childlist       最终目录会是文件列表
    showtype        最终目录的话会有两种模式


