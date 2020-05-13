# thinkcmf5.1广告插件

### 变动-使用
代码升级到thinkcmf5.1,新增后台菜单注解,广告内容使用ue编辑器,增加状态选择,增加查询缓存,提供模板设计所需的ad数据源

````
前台使用方法：

<php>echo plugins\tcad\service\TcadService::article('广告ID');</php>

or

<php>$ad = plugins\tcad\service\TcadService::article('广告ID');</php>
{$ad}

````

### 说明
data文件下的AdApi是给模板设计时提供ad的数据源，若不会使用的话不用理会，或者删除安装中的相关代码也可以<br>