 Smilies = {
        dom: function(id) {
            return document.getElementById(id);
        },
        grin: function(tag) {
            tag = ' ' + tag + ' ';
            myField = this.dom("textarea");
            document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
        },
        insertTag: function(tag) {
            myField = Smilies.dom("textarea");
            myField.selectionStart || myField.selectionStart == "0" ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length), cursorPos += tag.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += tag, myField.focus());
        }
    }