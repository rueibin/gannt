<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <script src="{{asset('/gt/dhtmlxgantt.js')}}"></script>
    <link href="{{asset('/gt/dhtmlxgantt.css')}}" rel="stylesheet">

    {{-- 設定中文，預設沒有locale_tw.js，要複製locale_cn.js修改 --}}
    <script src="{{asset('/gt/locale/locale_tw.js')}}"></script>
 
    <style type="text/css">
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }

    </style>
</head>
<body>
<div id="gantt_here" style='width:100%; height:100%;'></div>
<script type="text/javascript">


    gantt.config.order_branch = true;
    gantt.config.order_branch_free = true;


    gantt.config.min_column_width = 30;
	gantt.config.scale_height = 60;
	gantt.config.date_scale = "%d";
	gantt.config.subscales = [
		{unit:"month", step:1, date:"%F, %Y" },
		{unit:"year", step:1, date:"%Y" }
	];


	// gantt.config.row_height = 22;


    gantt.config.start_date = new Date(2018, 0, 1);
	gantt.config.end_date = new Date(2022, 0, 1);



    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.init("gantt_here");
    gantt.load("{{route('data')}}");

    var dp = new gantt.dataProcessor("{{url('/api')}}");

    dp.init(gantt);
    dp.setTransactionMode("REST");


</script>
</body>