<script type="text/javascript">
function loadlog() {
    var oldscrollHeight = $("#chatbox").attr("scrollHeight")-20;
    $.ajax( {
        url: "login.html",
        cache: false,
        success: (html) {
            $("chatbox").html(html);
            var newscrollHeight = $("#chatbox").attr("scrollHeight")-20;
            if (newscrollHeight > oldscrollHeight) {
                $("#chatbox").animate({ scrollTop: newscrollHeight});
            }
          } 
</script>