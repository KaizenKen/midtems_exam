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
  date_added timestamp default current_timestamp,
  edited_by int,
  foreign key (edited_by) references users(user_id),
  date_edited timestamp null
);

create table items(
  item_id int auto_increment,
  primary key (item_id),
  restaurant_id int,
  foreign key (restaurant_id) references restaurants(restaurant_id),
  item_name varchar(255) not null,
  item_price int not null,
  date_added timestamp default current_timestamp,
  edited_by int,
  foreign key (edited_by) references users(user_id),
  date_edited timestamp null
);

create table orders(
  order_id int auto_increment,
  primary key (order_id),
  customer_id int,
  foreign key (customer_id) references users(user_id),
  rider_id int,
  foreign key (rider_id) references users(user_id),
  ordered_items int,
  foreign key (ordered_items) references items(item_id),
  delivery_status varchar(255),
  date_ordered timestamp default current_timestamp,
  edited_by int,
  foreign key (edited_by) REFERENCES users(user_id),
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
values('Mei', '123', 'Customer');
insert into users(user_name, user_password, user_type)
values('Jason', '123', 'Customer');
insert into users(user_name, user_password, user_type)
values('Shadrach', '123', 'Customer');