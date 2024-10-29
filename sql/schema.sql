create table users(
  user_id int auto_increment,
  primary key (user_id),
  user_name varchar(255),
  user_password varchar(255),
  user_type varchar(255),
  user_contact varchar(255),
  user_address varchar(255),
  date_created timestamp default current_timestamp,
  edited_by int, foreign key (edited_by) references users(user_id),
  date_edited timestamp null
  );

create table restaurants(
  restaurant_id int auto_increment,
  primary key (restaurant_id),
  restaurant_name varchar(255),
  restaurant_location varchar(255),
  added_by int,
  date_added timestamp default current_timestamp,
  edited_by int,
  date_edited timestamp null
);

create table items(
  item_id int auto_increment,
  primary key (item_id),
  restaurant_id int,
  item_name varchar(255) not null,
  item_price int not null,
  added_by int,
  date_added timestamp default current_timestamp,
  edited_by int,
  date_edited timestamp null
);

create table orders(
  order_id int auto_increment,
  primary key (order_id),
  customer_id int,
  rider_id int,
  ordered_items int,
  delivery_status varchar(255),
  date_ordered timestamp default current_timestamp,
  edited_by int,
  date_edited timestamp null
);

insert into users(user_name, user_password, user_type)
values('Rainiel', '123', 'Admin');
insert into users(user_name, user_password, user_type)
values('Kirk', '123', 'Admin');
insert into users(user_name, user_password, user_type)
values('Constantino', '123', 'Admin');

insert into users(user_name, user_password, user_type)
values('Paul', '123', 'Customer');
insert into users(user_name, user_password, user_type)
values('JR', '123', 'Customer');
insert into users(user_name, user_password, user_type)
values('Kristel', '123', 'Customer');

insert into users(user_name, user_password, user_type)
values('Mei', '123', 'Rider');
insert into users(user_name, user_password, user_type)
values('Jason', '123', 'Rider');
insert into users(user_name, user_password, user_type)
values('Shadrach', '123', 'Rider');

insert into restaurants(restaurant_name, restaurant_location)
values('Jollibee', '123');

insert into items(item_name, item_price)
values('1-pc Chicken Joy', 89);
insert into items(item_name, item_price)
values('Jolly Spaghetti', 60);