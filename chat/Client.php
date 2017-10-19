<DOCTYPE html>
    <html>
    <head>
        <title>客户端</title>
        <meta charset="utf-8">
        <style>
            .inp1 {
                width:300px;
                height:100px;
            }
            .inp2{width:300px;height:100px;}
        </style>
        <script type='text/javascript' src="./jquery-1.7.1.min.js"></script>
        <script type="text/javascript">
            function getContent(){
              var setting = {
                    url: "fromServer.php",
                    "dataType": "json",
                    success: function (res) {
						console.log(res)
                        var obj = eval(res);
						if (obj.content != ''){
							$('.inp1').append('客服：' + obj.content + "\r\n");
						}
                    }
                };
                $.ajax(setting);
            }
            $(function () {
                //用ajax轮循的方式从数据库中获取客服是否有发数据给用户
                getContent(); //首次立即加载
                window.setInterval(getContent, 2000); //循环执行！！

                $('.btn1').click(function () {
                    var content = $('.inp2').val();
                    if (content == '') {
                        alert('请输入内容');
                        return;
                    }
                    //用户发送给客服
                    $.ajax({
                        type: "post",
                        url: "toServer.php",
                        data: {msg: content},
                        success: function (res) {
                            var msg = eval(res);
                            $('.inp1').append("致客服：" + content+"\r\n");
                            $('.inp2').val('');
                        }
                    })

                })
            })
        </script>

    </head>
    <body>
    <from>
        <textarea name="" class="inp1" cols="60" rows="20"></textarea>
        <p>向客服了解</p>
        <input type="text" name="content" class="inp2">
        <button class="btn1">发送</button>
    </from>
    </body>
    </html>