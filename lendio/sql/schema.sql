create table customers(
  customer_id int PRIMARY KEY AUTO_INCREMENT,
  customer_name varchar(255),
  customer_password varchar(255),
  customer_contact varchar(255),
  customer_address varchar(255),
  customer_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table riders(
  rider_id int PRIMARY KEY AUTO_INCREMENT,
  rider_name varchar(255),
  rider_password varchar(255),
  rider_contact varchar(255),
  rider_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table admins(
  admin_id int PRIMARY KEY AUTO_INCREMENT,
  admin_name varchar(255),
  admin_password varchar(255),
  admin_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table restaurants(
  restaurant_id int PRIMARY KEY AUTO_INCREMENT,
  restaurant_name varchar(255),
  restaurant_location varchar(255),
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_editted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  last_editted_by int
);

create table items(
  item_id int PRIMARY KEY AUTO_INCREMENT,
  restaurant_id int,
  item_name varchar(255),
  item_price int,
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_editted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  last_editted_by int
);

create table orders(
  order_id int PRIMARY KEY AUTO_INCREMENT,
  customer_id int,
  rider_id int,
  ordered_items int,
  delivery_status varchar(255),
  date_ordered TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  last_editted_by int
);