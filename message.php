
<html>
<head>
    <title>Send yourself a nice message!</title>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
	<script>
	    function submit_soap() {
		var mes=$("#message").val();
		alert(mes);
	}
	</script>

</head>
<body>
    <center>
        <h3>Send yourself a nice message!</h3>
        <form>
	    Message : <input name="message" id="message" type="test" /><br  />
	    <input type="button" value="Submit" onclick="submit_soap()"/>
	</form>

    </center>
</body>
</html>
