<html>
<head>
    <title></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        function html_to_pdf() {
            var element = document.getElementById('text');
            html2pdf(element).render();
        }
    </script>
</head>
<body>
<form id="form1">
    <div id="text">
        Convert this text to PDF.
    </div>
    <input type="button" value="Print Div Contents" id="btnPrint" onclick="f();" />
</form>
</body>
</html>