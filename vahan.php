<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<body onload="loginForm()">
    <form action="https://vahan.nic.in/nrservices/faces/user/report/jsp/searchadvance.jsp" name="myform" method="post">
    	<input id="regn_no1_exact" type="text" name="regn_no1_exact" autocomplete="off" value="" class="wiproStyleinput" maxlength="6" onblur="checkLength('regn_no1_exact',3)" onkeypress="return AlphaNumericOnly(event, '');" size="6" style="width:90px" value="DL2CV"/>
                                                                            &nbsp;
        <input id="regn_no2_exact" type="text" name="regn_no2_exact" autocomplete="off" value="" class="wiproStyleinput" maxlength="4" onblur="formatRegnPart('regn_no2_exact',4)" onkeypress="return NumericOnly(event, false);" size="4" style="width:70px;" value="8335"/>
        <input type="submit" name="j_id_jsp_988046885_30" value="Search Vehicle" onclick="javascript:gowait();" />
    </form>
  <script>
        function loginForm() {
            document.myform.submit();
        }
    </script>
</body>
</body>
</html>