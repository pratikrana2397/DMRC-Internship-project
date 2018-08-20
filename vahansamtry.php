<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<body onload="loginForm()">
    <form action="http://164.100.44.112/vahansamanvay/PoliceEnquiry.aspx" name="myform" method="post">
        <input type="text" name="ctl00$ContentPlaceHolder1$ddVehTypeName" value="287-511" >
    	<input type="text" name="ctl00$ContentPlaceHolder1$txtRegistration" value="DL2CV8335" >
        <input type="submit" name="criteria" value="search">
    </form>
  <script>
        function loginForm() {
            document.myform.submit();
        }
    </script>
</body>
</body>
</html>