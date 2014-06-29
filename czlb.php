<html lang="zh-cn">

<head>
    <link href="http://cdn.bootcss.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style='padding-top: 70px;'>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <a class="btn btn-default navbar-btn" href='index.php'><span class='glyphicon glyphicon-arrow-left'></span></a>
        <p class="navbar-text">源程序2092-ms战参战列表</p>
    </nav>

    <div class='container'>
        <div class='row'>
            <div class="col-md-3">
                <h2 style='text-align:center'>战斗背景</h2>
                <p>类型：宇宙ms战</p>
                <p>参战人数：3v3~8v8</p>
                <p>战斗宙域：UnKnown(空旷的宇宙空间)</p>
                <p>参战势力：
                    <ul>
                        <li>【联邦巡逻舰队】</li>
                        <li>【?西玛舰队?】</li>
                    </ul>
                </p>
                <p>支援能力:
                    <ul>
                        <li>【联邦巡逻舰队】:【全弹覆盖】</li>
                        <li>【?西玛舰队?】:【超视距感应诱导炮击】</li>
                    </ul>
                </p>
                <p>
                    战役简报：
                    <br>两方必须各有一个领队，各自的部队领队将在开战前一小时收到命令，依据命令配置你们的机动战士。
                    <br>对战限定于最高20个回合，20回合后将判定胜负。
                    <br>战斗爆发的地点在开战前一小时才会暴露。
                    <br>机体装备不限 但是请考虑驾驶员。
                    <br>武备方面，将对各类武器进行分级，依据其重量 体积 重要程度进行分级 限制武器搭载。
                    <br>请在至少开战前两小时完成小队编组，那么 祝各位驾驶员好运！
                </p>
            </div>
            <div class="col-md-7">
                <h2 style='text-align:center'>战斗记录</h2>
                <div id='logs'>
                    <?php echo file_get_contents( 'record/online.txt');?>

                </div>


                <a id='adder' class='btn btn-primary'>参战人员点此添加纪录</a>
                <!-- 加载编辑器的容器 -->
                <script id="container" name="content" type="text/plain"></script>
                <!-- 配置文件 -->
                <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
                <!-- 编辑器源码文件 -->
                <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    $('#adder').bind('click', loadeditor);
                    flag = false;
                    flag2 = false;

                    function loadlog() {
                        $.post("addlog.php", function (data) {
                            $('#logs').html(data);
                        });
                    }
                    setInterval('loadlog()', 30000);

                    function send() {

                        if (!(flag2)) {
                            $('#adder').text('发送中......');
                            $('#adder').unbind('click', send);
                            $.post("addlog.php", {
                                log: UE.getEditor('container').getContent()
                            }, function (data) {
                                $('#logs').html(data);
                                $('#adder').text('发送完成');
                                UE.getEditor('container').setHide();
                                flag2 = true;
                            });


                        };
                    };

                    function loadeditor() {
                        if (!(flag)) {
                            var ue = UE.getEditor('container');
                            $('#adder').unbind('click', loadeditor);
                            $('#adder').click(send);
                            $('#adder').text('点此发送');
                            flag = true;
                        }

                    }
                </script>
            </div>
            <div class="col-md-2">

			<?php
			
			
			$fz=json_decode(file_get_contents('fz.json'),1);
			$dic=array();
			foreach ($fz as $sl){array_push($dic,$sl);}
			
			
			?>
				<?php foreach ($fz as $sl){ ?>
                <h2 style='text-align:center'><?php echo $sl['name'];?></h2>
				<?php foreach ($sl['people'] as $people) {?>
                <div style='text-align:center'><?php echo $people;?><br>
				<?php foreach ($dic as $lk) { if ($sl['name']!=$lk['name']){?>
				<a href='gfz.php?people=<?php echo json_encode($people);?>&fz=<?php echo $lk['id'];?>'>换到<?php echo $lk['name'];?></a><br>
				<?php }} ?>
				</div>
				<?php }} ?>


            </div>
        </div>
    </div>




</body>

</html>

<!--

蜜娜
	莱德
	空航
	行剑无疆
	风行者

新殖民
	本
	扎古脑袋
	白兰
	guxiang



-->


