/* 定义用于验证的正则表达式 */
let telephoneReg = /^1[3-9][0-9]{9}$/i;
let nameReg = /^[\u4E00-\u9FA5]{2,5}$/i;
let emailReg = /^\w{3,}(\.\w+)*@[A-z0-9]+(\.[A-z]{2,5}){1,2}$/i;

/* 用于判断是否提交表单的数组变量 */
let sta = [];
for(let i=0 ; i<8 ; ++i) {
    sta[i] = false;
}

/* 添加异步注册方式 */
$("#submit").click(function () {
    let data = $("#registerForm").serializeArray();
    console.log(data);
    $.ajax({
        type: 'post',
        url: 'http://localhost:8000/admin/addNew',
        data: data,
        dataType: 'text',
        success: function (e) {
            console.log(e);
            alert('注册成功');
            location.reload();
        },
        error: function () {
            alert('注册失败');
        },
        async: true
    });
});

/* 弹出对话框，用户确定删除 */
function del(data) {
    //console.log(data);
    let status = window.confirm("确定要删除"+data+"吗");
    if(status == true) {
        location.href = "http://localhost:8000/admin/delete/"+data;
    }
}

/* 判断是否可提交 */
function disabledOrNot() {
    for(let i=0 ; i<8 ; ++i) {
        if(sta[i] == false) {
            return false;
        }
    }
    return true;
}

function judge() {
    if(disabledOrNot()) {
        $("#submit").removeAttr('disabled');
    } else {
        $("#submit").attr('disabled',"disabled");
    }
    /*console.log(sta);*/
}
/* 以下为提交内容的验证 */
$("#inputUsername").blur(function () {
    let str = $("#inputUsername").val();
    if(str) {
        sta[0] = true;
        $("#inputUsernameBox").removeClass('has-error');
        $("#inputUsernameBox").addClass('has-success');
    } else {
        sta[0] = false;
        $("#inputUsernameBox").removeClass('has-success');
        $("#inputUsernameBox").addClass('has-error');
    }
    judge();
});

$("#inputName").blur(function () {
    let str = $("#inputName").val();
    if(nameReg.test(str)) {
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

$("#inputPassword").blur(function () {
    let str = $("#inputPassword").val();
    if(str && $("#inputPasswordTwice").val() == str) {
        sta[2] = true;
        sta[3] = true;
        $("#inputPasswordBox").removeClass('has-error');
        $("#inputPasswordBoxTwice").removeClass('has-error');
        $("#inputPasswordBoxTwice").addClass('has-success');
        $("#inputPasswordBox").addClass('has-success');
    } else {
        sta[2] = false;
        sta[3] = false;
        $("#inputPasswordBoxTwice").removeClass('has-success');
        $("#inputPasswordBox").removeClass('has-success');
        $("#inputPasswordBox").addClass('has-error');
        $("#inputPasswordBoxTwice").addClass('has-error');
    }
    judge();
});

$("#inputPasswordTwice").blur(function () {
    let str = $("#inputPasswordTwice").val();
    if(str && $("#inputPassword").val() == str) {
        sta[3] = true;
        sta[2] = true;
        $("#inputPasswordBox").removeClass('has-error');
        $("#inputPasswordBoxTwice").removeClass('has-error');
        $("#inputPasswordBoxTwice").addClass('has-success');
        $("#inputPasswordBox").addClass('has-success');
    } else {
        sta[3] = false;
        sta[2] = false;
        $("#inputPasswordBoxTwice").removeClass('has-success');
        $("#inputPasswordBox").removeClass('has-success');
        $("#inputPasswordBox").addClass('has-error');
        $("#inputPasswordBoxTwice").addClass('has-error');
    }
    judge();
});

$("#inputEmail").blur(function () {
    let str = $("#inputEmail").val();
    if(emailReg.test(str)) {
        sta[4] = true;
        $("#inputEmailBox").removeClass('has-error');
        $("#inputEmailBox").addClass('has-success');
    } else {
        sta[4] = false;
        $("#inputEmailBox").removeClass('has-success');
        $("#inputEmailBox").addClass('has-error');
    }
    judge();
});

$("#inputTel").blur(function () {
    let str = $("#inputTel").val();
    if(telephoneReg.test(str)) {
        sta[5] = true;
        $("#inputTelBox").removeClass('has-error');
        $("#inputTelBox").addClass('has-success');
    } else {
        sta[5] = false;
        $("#inputTelBox").removeClass('has-success');
        $("#inputTelBox").addClass('has-error');
    }
    judge();
});

$("#inputRole").change(function () {
    let value = $("#inputRole").find('option:selected').val();
    if(value != -1) {
        sta[6] = true;
        $("#inputRoleBox").removeClass('has-error');
        $("#inputRoleBox").addClass('has-success');
    } else {
        sta[6] = false;
        $("#inputRoleBox").removeClass('has-success');
        $("#inputRoleBox").addClass('has-error');
    }
    judge();
});

$("#inputWorkcell").change(function () {
    let str = $("#inputWorkcell").val();
    if(str) {
        sta[7] = true;
        $("#inputWorkcellBox").removeClass('has-error');
        $("#inputWorkcellBox").addClass('has-success');
    } else {
        sta[7] = false;
        $("#inputWorkcellBox").removeClass('has-success');
        $("#inputWorkcellBox").addClass('has-error');
    }
    judge();
});