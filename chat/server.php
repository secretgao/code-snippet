<DOCTYPE html>
<html>
<head>
	<title>服务</title>
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
		function showMsg(msg) {
			console.log(msg);
			var obj= eval(msg);
			$('#text1').append(" 用户向你发送了："+obj.content+"\n\r");
		}
		
		$(function(){
			$('#btn2').click(function(){
				var content = $('.inp2').val();
				if(content == ''){
					alert('聊天内容不能为空');
					return ;
				}
				$.ajax({
					type: "post",
					url: "toClient.php",
					data: {msg: content},
					success: function (res) {
						var msg = eval(res);
						$('#text1').append(" 你向用户发送了："+content+"\r\n");
						$('.inp2').val('');
					}
				})
			})
		})
	</script>
</head>
<body>
	<iframe src="./fromClient.php"  width="0" height="0" frameborder="0"></iframe> 
	<from>
		<textarea id="text1" cols="30" rows="10"></textarea>
		<p>与用户聊天：</p>
		<input type="text" name="content" class="inp2">
		<button id ='btn2'>发送</button>
	</from>
</body>
</html>
