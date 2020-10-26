<script type="text/javascript">
function loadlog() {
setInterval (loadlog, 2500);
   $.ajax({
     url: "login.html",
        cache: false,
        success: (html){
            $("chatbox").html(html);
        };
    }
    setInterval (loadlog, 2500);
</script>