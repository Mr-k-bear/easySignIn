<?php
	/**
     * @param array $data 要导出的数据
     * @param array $title excel表格的表头
     * @param string $filename 文件名
     */

    function daochu_excel($data=array(),$title=array(),$filename='报表'){//导出excel表格
        //处理中文文件名
        ob_end_clean();
        Header('content-Type:application/vnd.ms-excel;charset=utf-8');
        header("Content-Disposition:attachment;filename=export_data.xls");
        //处理中文文件名
        $ua = $_SERVER["HTTP_USER_AGENT"];
        $encoded_filename = urlencode($filename);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);
        if (preg_match("/MSIE/", $ua) || preg_match("/LCTE/", $ua) || $ua == 'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko') {
            header('Content-Disposition: attachment; filename="' . $encoded_filename . '.xls"');
        }else {
            header('Content-Disposition: attachment; filename="' . $filename . '.xls"');
        }
        header ( "Content-type:application/vnd.ms-excel" );
        $html = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <meta http-equiv='Content-type' content='text/html;charset=UTF-8' />
            <head>
            <title>".$filename."</title>
            <style>
            td{
                text-align:center;
                font-size:12px;
                font-family:Arial, Helvetica, sans-serif;
                border:#000000 1px solid;
                width:auto;
            }

            table,tr{
                border-style:none;
            }

            .title{
                color:#000000;
                font-weight:bold;
            }

            </style>
            </head>
            <body>
            <table width='100%' border='1'>
              <tr>";

        foreach($title as $k=>$v){
            $html .= " <td class='title' style='text-align:center;'>".$v."</td>";
        }

        $html .= "</tr>";

        foreach ($data as $key => $value) {
            $html .= "<tr>";
            foreach($value as $aa){
                $html .= "<td>".$aa."</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</table></body></html>";
        echo $html;
        exit;
    }

	daochu_excel(json_decode(file_get_contents("../data.json"),true),["部门","姓名","学号","签到时间","使用ip"],"签到表");