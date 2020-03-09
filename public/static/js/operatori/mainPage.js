/* 处理模态框发送的请求 */
$("#submit").click(function () {
    let data = $("#addForm").serializeArray();

    $.ajax({
        type: 'post',
        url: 'http://localhost:8000/operatori/addNew',
        data: data,
        dataType: 'text',
        success: function (e) {
            console.log(e);
            alert('请求发送成功，等待审核中');
            location.reload();
        },
        error: function () {
            alert('请求发送失败');
        },
        async: true
    });
});

/* 用于判断提交状态的数组，当数组全部为true时才能提交 */
var sta = [], length = 10;
/* 数组变量sta初始化为false  */
for(let i=0 ; i < length ; ++i) {
    sta[i] = false;
}

/*
* 功能：判断sta数组是否全为true
* 返回：全为true返回true，否则返回false
* */
function disableOrNot() {
    for(let i=0 ; i<length ; ++i) {
        if(sta[i] == false) {
            return false;
        }
    }
    return true;
}

/*
* 功能：根据sta的值给submit按钮添加class
* */
function judge() {
    if(disableOrNot()) {
        $("#submit").removeAttr('disabled');
    } else {
        $("#submit").attr('disabled','disabled');
    }
}

$("#inputCode").blur(function () {
    let str = $("#inputCode").val();

    if(str) {
        sta[0] = true;
        $("#inputCodeBox").removeClass('has-error');
        $("#inputCodeBox").addClass('has-success');
    } else {
        sta[0] = false;
        $("#inputCodeBox").removeClass('has-success');
        $("#inputCodeBox").addClass('has-error');
    }
    judge();
});

$("#inputName").blur(function () {
    let str = $("#inputName").val();

    if(str) {
        sta[1] = true;
        $("#inputNameBox").removeClass('has-error');
        $("#inputNameBox").addClass('has-success');
    } else {
        sta[1] = false;
        $("#inputNameBox").removeClass('has-success');
        $("#inputNameBox").addClass('has-error');
    }
    judge();
});

$("#inputFamilyid").blur(function () {
    let str = $("#inputFamilyid").val();

    if(str) {
        sta[2] = true;
        $("#inputFamilyidBox").removeClass('has-error');
        $("#inputFamilyidBox").addClass('has-success');
    } else {
        sta[2] = false;
        $("#inputFamilyidBox").removeClass('has-success');
        $("#inputFamilyidBox").addClass('has-error');
    }
    judge();
});

$("#inputModel").blur(function () {
    let str = $("#inputModel").val();

    if(str) {
        sta[3] = true;
        $("#inputModelBox").removeClass('has-error');
        $("#inputModelBox").addClass('has-success');
    } else {
        sta[3] = false;
        $("#inputModelBox").removeClass('has-success');
        $("#inputModelBox").addClass('has-error');
    }
    judge();
});

$("#inputPartno").blur(function () {
    let str = $("#inputPartno").val();

    if(str) {
        sta[4] = true;
        $("#inputPartnoBox").removeClass('has-error');
        $("#inputPartnoBox").addClass('has-success');
    } else {
        sta[4] = false;
        $("#inputPartnoBox").removeClass('has-success');
        $("#inputPartnoBox").addClass('has-error');
    }
    judge();
});

$("#inputUpl").blur(function () {
    let str = $("#inputUpl").val();

    if(str) {
        sta[5] = true;
        $("#inputUplBox").removeClass('has-error');
        $("#inputUplBox").addClass('has-success');
    } else {
        sta[5] = false;
        $("#inputUplBox").removeClass('has-success');
        $("#inputUplBox").addClass('has-error');
    }
    judge();
});

$("#inputUsefor").blur(function () {
    let str = $("#inputUsefor").val();

    if(str) {
        sta[6] = true;
        $("#inputUseforBox").removeClass('has-error');
        $("#inputUseforBox").addClass('has-success');
    } else {
        sta[6] = false;
        $("#inputUseforBox").removeClass('has-success');
        $("#inputUseforBox").addClass('has-error');
    }
    judge();
});

$("#inputPmperiod").blur(function () {
    let str = $("#inputPmperiod").val();

    if(str) {
        sta[7] = true;
        $("#inputPmperiodBox").removeClass('has-error');
        $("#inputPmperiodBox").addClass('has-success');
    } else {
        sta[7] = false;
        $("#inputPmperiodBox").removeClass('has-success');
        $("#inputPmperiodBox").addClass('has-error');
    }
    judge();
});

$("#inputOwner").blur(function () {
    let str = $("#inputOwner").val();

    if(str) {
        sta[8] = true;
        $("#inputOwnerBox").removeClass('has-error');
        $("#inputOwnerBox").addClass('has-success');
    } else {
        sta[8] = false;
        $("#inputOwnerBox").removeClass('has-success');
        $("#inputOwnerBox").addClass('has-error');
    }
    judge();
});

$("#inputWorkcell").blur(function () {
    let str = $("#inputWorkcell").val();

    if(str) {
        sta[9] = true;
        $("#inputWorkcellBox").removeClass('has-error');
        $("#inputWorkcellBox").addClass('has-success');
    } else {
        sta[9] = false;
        $("#inputWorkcellBox").removeClass('has-success');
        $("#inputWorkcellBox").addClass('has-error');
    }
    judge();
});