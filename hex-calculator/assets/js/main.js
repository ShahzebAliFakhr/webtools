var clipboard = new ClipboardJS('.copytoclipboard');

clipboard.on('success', function(e) {
    alert('Copied!')
    e.clearSelection();
});

function select_all_result(){
    var selectAll = document.getElementById("result");
    selectAll.select();
}

function reset_all_result(){
    document.getElementById("result").value = '';
}
