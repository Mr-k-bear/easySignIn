<?php
    $gml=$_REQUEST["gml"];
    $data=file_get_contents("./api/token.txt");
    $classio="二维码失效！";
    if($gml==$data){
        $classio="a";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>签到系统</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
        <link rel="stylesheet" href="css/index.css" type="text/css">
        <script src="js/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <div id="data" class="<?php echo $classio ?>"></div>
        <div class="head">
            <img src="img/logo.png">
        </div>
        <div class="main" id="main1">
            <div class="tit">
                <div>创业之路演讲会</div>
                <div class="p">社团成员签到</div>
            </div>
            <div class="select">
                <div id="ss">请选择部门</div>
                <div class="sslist" style="display: none" id="ssl">
                    <div class="ssr">非社团人员</div>
                    <div class="ssr">竞赛项目部</div>
                    <div class="ssr">媒体运营部</div>
                    <div class="ssr">外联孵化部</div>
                    <div class="ssr">选传策划部</div>
                    <div class="ssr">大创项目部</div>
                    <div class="ssr">办公室</div>
                    <div class="ssr">主席团</div>
                </div>
            </div>
            <div class="input">
                <input type="text" placeholder="请输入姓名" id="input">
                <input type="text" placeholder="请输入学号" id="inputuser">
            </div>
            <div class="go">
                <div id="go">提交</div>
            </div>
            <div style="height:40px"></div>
        </div>
        <div class="main" id="main2" style="display: none">
            <div id="cont">加载中...</div>
        </div>
    </body>
</html>