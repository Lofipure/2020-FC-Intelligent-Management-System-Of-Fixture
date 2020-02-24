/* 用于判断的变量 */
let sta = [];
for(let i=0 ; i<6 ; ++i) {
    sta[i] = false;
}

function disabledOrNot() {
    for (let i=0 ; i<6 ; ++i) {
        if(sta[i] == false) {
            return false;
        }
    }
    return  true;
}

function judge() {
    if(disabledOrNot()) {
        $("#submit").removeAttr('disabled');
    } else {
        $("#submit").attr('disabled',"disabled");
    }
    /*console.log(sta);*/
}
/* 定义用于验证的正则表达式 */
let telephoneReg = /^1[3-9][0-9]{9}$/i;
let emailReg = /^\w{3,}(\.\w+)*@[A-z0-9]+(\.[A-z]{2,5}){1,2}$/i;

$("#inputPassword").blur(function () {
    let str = $("#inputPassword").val();

    if(str && str == $("#inputPasswordTwice").val()) {
        sta[0] = true;
        sta[1] = true;
        $("#inputPasswordBox").removeClass('has-error');
        $("#inputPasswordTwiceBox").removeClass('has-error');
        $("#inputPasswordBox").addClass('has-success');
        $("#inputPasswordTwiceBox").addClass('has-success');
    } else {
        sta[0] = false;
        sta[1] = false;
        $("#inputPasswordBox").removeClass('has-success');
        $("#inputPasswordTwiceBox").removeClass('has-success');
        $("#inputPasswordBox").addClass('has-error');
        $("#inputPasswordTwiceBox").addClass('has-error');
    }
    judge();
});

$("#inputPasswordTwice").blur(function () {
    let str = $("#inputPasswordTwice").val();

    if(str && str == $("#inputPassword").val()) {
        sta[0] = true;
        sta[1] = true;
        $("#inputPasswordBox").removeClass('has-error');
        $("#inputPasswordTwiceBox").removeClass('has-error');
        $("#inputPasswordBox").addClass('has-success');
        $("#inputPasswordTwiceBox").removeClass('has-success');
    } else {
        sta[0] = false;
        sta[1] = false;
        $("#inputPasswordBox").removeClass('has-success');
        $("#inputPasswordTwiceBox").removeClass('has-success');
        $("#inputPasswordBox").addClass('has-error');
        $("#inputPasswordTwiceBox").removeClass('has-error');
    }
    judge();
});

$("#inputTel").blur(function () {
    let str = $("#inputTel").val();

    if(telephoneReg.test(str) && str) {
        sta[2] = true;
        $("#inputTelBox").removeClass('has-error');
        $("#inputTelBox").addClass('has-success');
    } else {
        sta[2] = false;
        $("#inputTelBox").removeClass('has-success');
        $("#inputTelBox").addClass('has-error');
    }
    judge();
});

$("#inputEmail").blur(function () {
    let str = $("#inputEmail").val();

    if(emailReg.test(str) && str) {
        sta[3] = true;
        $("#inputEmailBox").removeClass('has-error');
        $("#inputEmailBox").addClass('has-success');
    } else {
        sta[3] = false;
        $("#inputEmailBox").removeClass('has-success');
        $("#inputEmailBox").addClass('has-error');
    }
    judge();
});

$("#inputWorkcell").blur(function () {
    let str = $("#inputWorkcell").val();

    if(str) {
        sta[4] = true;
        $("#inputWorkcellBox").removeClass('has-error');
        $("#inputWorkcellBox").addClass('has-success');
    } else {
        sta[4] = false;
        $("#inputWorkcellBox").removeClass('has-success');
        $("#inputWorkcellBox").addClass('has-error');
    }
    judge();
});

$("#inputRole").change(function () {
    let value = $("#inputRole").find('option:selected').val();
    if(value != -1) {
        sta[5] = true;
        $("#inputRoleBox").removeClass('has-error');
        $("#inputRoleBox").addClass('has-success');
    } else {
        sta[5] = false;
        $("#inputRoleBox").removeClass('has-success');
        $("#inputRoleBox").addClass('has-error');
    }
    judge();
});