	<div id="display"></div>

	<script>
		setInterval(function(){

			var xhr = new  XMLHttpRequest();
			xhr.open('GET', 'response.php', true);

			xhr.onload = function ()
			{
				if (xhr.status == 200) {
					//document.write(this.responseText);
					document.getElementById('display').innerHTML=xhr.responseText;
				} else {

					document.write('File not Found');
				}
			}

			xhr.send();

		},1000)
	</script>