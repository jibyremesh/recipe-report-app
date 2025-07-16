function toggle(selectAllElement) {
    var checkBoxList = document.getElementsByName('recipes[]');
    for (var i = 0; i < checkBoxList.length; i++) {
        checkBoxList[i].checked = selectAllElement.checked;
    }
}