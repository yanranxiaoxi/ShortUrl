function delete_url(id) {
    if (confirm('你确定要删除这条记录吗？')) {
        document.location = 'index.php?delete_id=' + id;
    }
}
function update_url(id) {
    if (confirm('你确定要更改这条记录吗？')) {
        document.location = 'update?id=' + id;
    }
}
