create database if not exists 'supershop' default character set utf8 collate utf8_general_ci;

--管理员表
drop table if exists admin;

create TABLE shop_admin(
id tinyint unsigned auto_increment key,
username varchar(20) not null unique,
password char(32) not null,
email varchar(50) not null
);

--分类表
create TABLE shop_category(
id smallint unsigned auto_increment key,
cname varchar(20) not null unique
);

--商品表
create TABLE shop_good(
id int unsigned auto_increment key,
gname varchar(50) not null unique,
gnum int not null,
gprice decimal(10,2) not null,
gintro text,
gimg varchar(50) not null,
guptime int not null,
isshow tinyint(1) default 1,
ishot tinyint(1) default 0,
cid smallint unsigned not null
);

--用户表
create TABLE shop_user(
id int unsigned auto_increment key,
username varchar(20) not null unique,
password char(32) not null,
sex enum("男","女","保密") not null default "保密",  --出错原因！
image varchar(50) not null,
email varchar(50) not null,
jointime int not null
);

--商品图片
create table shop_good_picture(
id int auto_increment key,
gid int not null,
path varchar(250)
);