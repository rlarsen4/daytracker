CREATE TABLE student_milestone (
    student_id int not null, 
    milestone_id int not null, 
    date_scheduled date, 
    date_completed date, 
    primary key ( student_id, milestone_id )
);

CREATE TABLE fluu (
    fluu_id int not null auto_increment primary key,
    first_name varchar(255),
    last_name varchar(255),
    username varchar(255),
    password varchar(255)
);

CREATE TABLE pet (
    id int not null auto_increment primary key,
    user_id int,
    name varchar (255),
    pet_type_id varchar(255)
);

CREATE TABLE pet_type (
    id int not null auto_increment primary key,
    type varchar(255)
);