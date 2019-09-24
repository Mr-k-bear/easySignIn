var qrcode; var code;
var ranStr = function(){
    let chars = 'abcdefghijklmnopqrstuvwxyz123456789';
    let maxPos = chars.length;
    let pwd = '';
    for ( let i = 0; i < 16; i++){
        pwd += chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
};
var del = function(e){
    $.ajax({
        url: "./api/del.php",
        data: {index: e},
        success: function (e) {
            var data = JSON.parse(e);
            var appendData = "";
            for (let i = 0; i < data.length; i++) {
                appendData += `<div onclick="del(${i})">${data[i][0]} ${data[i][1]}</div>`
            }
            $("#stulist").empty().append(appendData);
        }
    });
};
$(document).ready(function () {
    qrcode = new QRCode($("#qrcode")[0], {
        width: 300,
        height: 300
    });
    code = ranStr();
    qrcode.makeCode(code);
    var ffc = function() {
        $.ajax({
            url: "./api/token.php",
            data: {
                pass: "aaabbb",
                token: code
            },
            success: function (e) {
                qrcode.makeCode("https://ccpe.top/qiandao/?gml="+code);
                code = ranStr();
                var data = JSON.parse(e);
                var appendData = "";
                for (let i = 0; i < data.length; i++) {
                    appendData += `<div onclick="del(${i})">${data[i][0]} ${data[i][1]}</div>`
                }
                $("#stulist").empty().append(appendData);
                setTimeout(ffc,5000);
            }
        });
    }
    ffc();
});