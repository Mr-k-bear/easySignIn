var group = undefined;
var name = "";
var user = "";
var gml = ['非社团人员','竞赛项目部','媒体运营部','外联孵化部','选传策划部','大创项目部','办公室','主席团'];
$(document).ready(function () {
    var fortag = function (fn) {
        (function (e) {
            for (let s = 0; s < e.length; s++){
                fn.bind(e,$(e[s],s))(s);
            }
        })($(".ssr"))
    };
    var debug = function(e){
        $("#main1").hide();
        $("#main2").show();
        $("#cont").html(e);
    };
    if($("#data").attr("class")!=="a"){
        debug($("#data").attr("class"));
    }
    fortag(function (d,s) {
        d.click((function (e) {
            fortag(function (ff) {
                ff.css({
                    color: "#767676",
                    backgroundColor: "#ffffff"
                });
            });
            this.css({
                color: "#ffffff",
                backgroundColor: "#ef8763"
            });
            group = e;
            // console.log(e)
            $("#ss").html(gml[e]);
            $("#ssl").removeClass("down").addClass("up");
        }).bind(d,s));
    });
    $("#ss").click(function (e) {
        $("#ssl").show().removeClass("up").addClass("down");
    });
    $("#input").bind("input propertychange",function(event){
        name = $("#input").val()
    });
    $("#inputuser").bind("input propertychange",function(event){
        user = $("#inputuser").val()
    });
    $("#go").click(function(e){
        if ( !user || !name || (group === undefined) ) return alert("请填好全部信息！");
        console.log(gml[group],name);
        $.ajax({
            url: "./api/run.php",
            data: {gml:gml[group],name,user},
            success: debug
        })
    });
});
