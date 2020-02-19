create database fc charset = utf8;
use fc;

create table tool (
    id int auto_increment primary key not null ,
    code varchar(32) not null ,             /*夹具代码*/
    name varchar(63) not null ,             /*夹具名称*/
    familyid varchar(32) not null ,         /*所属大类*/
    model varchar(32) not null ,            /*夹具模组*/
    partno varchar(32) not null ,           /*夹具料号*/
    upl int not null ,                      /*在每条产线上需要配备的数量*/
    usefor varchar(64) not null ,           /*用途*/
    pmperiod varchar(32) not null ,         /*保养周期*/
    owner varchar(32) not null ,            /*负责人*/
    workcell int not null ,                 /*所属工作部*/
    buystatus int not null default 0 ,
    /*
    当前夹具的采购状态
    - 0：初级用户提交申请
    - 1：监管员终审
    - 2：部门经理终审并且投入使用
    */
    IEstatus int not null default 0 ,
    /*
    当前夹具的进出库状态
    - 0：在库中，可借或者线上工人归还
    - 1：线上工人发出请求
    - 2：OperatorI 处理请求，等待归还
    */
    repairstatus int not null default 0
    /*
    当前夹具的报修状态
    - 0：线上可用
    - 1：OperatorI提交请求等待OperatorII处理
    - 2：OperatorII已阅并且维修中
    */
)charset = utf8 , engine = InnoDB;
/*
    admin: 0
    operatorI: 1
    operatorII: 2
    supervisor: 3
    manager: 4
    normal: 5
*/
create table user(
    id int auto_increment primary key not null ,
    username varchar(64) not null ,         /*账号*/
    name varchar(64) not null ,             /*姓名*/
    telephone varchar(32) not null ,
    email varchar(32) not null ,
    password varchar(64) not null ,
    role int not null ,
    workcell int not null
)charset = utf8 , engine = InnoDB;

/*进出库记录表*/
create table IErecord(
    id int auto_increment primary key not null ,
    intime datetime not null ,
    outtime datetime not null ,
    toolid int not null
) charset = utf8 , engine = InnoDB;

/*报修返厂记录表*/
create table repairrecord(
    id int auto_increment primary key not null ,
    intime datetime not null ,
    outtime datetime not null ,
    toolid int not null
) charset = utf8 , engine = InnoDB;

/* 一本正经的捏造数据 */
insert into tool (code, name, familyid, model, partno, upl, usefor, pmperiod, owner, workcell, buystatus, IEstatus, repairstatus) values
(
 'fctext01','服创测试数据01','测试大类01','测试模组01','FC001',5,'用途1','30','Lofipure',1,0,0,0
);
insert into tool (code, name, familyid, model, partno, upl, usefor, pmperiod, owner, workcell, buystatus, IEstatus, repairstatus) values
(
 'fctext02','服创测试数据02','测试大类01','测试模组01','FC002',3,'用途2','30','Lofipure',1,0,0,0
);
insert into tool (code, name, familyid, model, partno, upl, usefor, pmperiod, owner, workcell, buystatus, IEstatus, repairstatus) values
(
 'fctext03','服创测试数据03','测试大类02','测试模组02','FC003',3,'用途2','30','Lofipure',2,0,0,0
);
insert into tool (code, name, familyid, model, partno, upl, usefor, pmperiod, owner, workcell, buystatus, IEstatus, repairstatus) values
(
 'fctext04','服创测试数据04','测试大类02','测试模组02','FC004',3,'用途2','30','Lofipure',2,0,0,0
);
insert into tool (code, name, familyid, model, partno, upl, usefor, pmperiod, owner, workcell, buystatus, IEstatus, repairstatus) values
(
 'fctext05','服创测试数据05','测试大类03','测试模组02','FC005',3,'用途2','30','Lofipure',3,0,0,0
);
insert into tool (code, name, familyid, model, partno, upl, usefor, pmperiod, owner, workcell, buystatus, IEstatus, repairstatus) values
(
 'fctext06','服创测试数据06','测试大类03','测试模组02','FC006',3,'用途2','30','Lofipure',4,0,0,0
);

/* 管理员 */
insert into user (username, name, telephone, email, password, role, workcell)
values ('adminone','管理员一号','15391208465','littlebanana@126.com','admin',0,0);
insert into user (username, name, telephone, email, password, role, workcell)
values ('admintwo','管理员一号','18747238458','littlebanana@163.com','admin',0,0);
/* 初级用户 */
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatorone','初级用户一号','15391208465','littlebanana@126.com','admin',1,1);
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatortwo','初级用户二号','18747238458','littlebanana@163.com','admin',1,2);
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatorthree','初级用户三号','15391208465','littlebanana@126.com','admin',1,3);
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatorfour','初级用户四号','18747238458','littlebanana@163.com','admin',1,4);
/* 高级用户 */
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatorIIone','高级用户一号','15391208465','littlebanana@126.com','admin',2,1);
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatorIItwo','高级用户二号','18747238458','littlebanana@163.com','admin',2,2);
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatorIIthree','高级用户三号','15391208465','littlebanana@126.com','admin',2,3);
insert into user (username, name, telephone, email, password, role, workcell)
values ('operatorIIfour','高级用户四号','18747238458','littlebanana@163.com','admin',2,4);