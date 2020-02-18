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
    telephone varchar(12) not null ,
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