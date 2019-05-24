CREATE TABLE groups (
    id serial primary key,
    name character varying(100) NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL
);

INSERT INTO groups VALUES (1, 'Supers', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
INSERT INTO groups VALUES (2, 'Admins', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
INSERT INTO groups VALUES (3, 'Managers', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
INSERT INTO groups VALUES (4, 'Users', '2016-08-30 21:15:01', '2016-08-30 21:15:01');
ALTER SEQUENCE "groups_id_seq" RESTART WITH 5;

CREATE TABLE users (
    id serial primary key,
    username character varying(55) UNIQUE NOT NULL,
    password character varying(255) NOT NULL,
    group_id integer NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL,
    constraint group_fk foreign key (group_id) references groups(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO users VALUES (1, 'super', '$2y$10$xYFpaipCoUJw6LmYr6SuFe/XH3w/GsiTd7DefUf1Ky3CHmkTAMDIe', 1, '2016-09-28 20:41:02', '2016-09-28 20:41:02');
INSERT INTO users VALUES (2, 'admin', '$2y$10$GYRI2Ze7sRn/65bZDdUYTexEP1bifK2guHqPmCcdAa41MTD6u1gka', 2, '2016-09-28 20:41:12', '2016-09-28 20:41:12');
INSERT INTO users VALUES (3, 'manager', '$2y$10$Fpv1fmHwJxC10/qIEPCkt.PvwcsJqYL2d4ceBHzyc9C.huSiHygM.', 3, '2016-09-28 20:41:23', '2016-09-28 20:41:23');
INSERT INTO users VALUES (4, 'user', '$2y$10$.7Nr1.zDhq69axFaPviZauKNl7Gg9pHV3E110H.bx9euPwiJDl3Au', 4, '2016-09-28 20:41:33', '2016-09-28 20:41:33');
ALTER SEQUENCE "users_id_seq" RESTART WITH 5;

CREATE TABLE permissions (
    id serial primary key,
    group_id integer NOT NULL,
    controller character varying(50) NOT NULL,
    action character varying(100) NOT NULL,
    created timestamp(0) without time zone DEFAULT NULL,
    modified timestamp(0) without time zone DEFAULT NULL,    
    CONSTRAINT unique_key UNIQUE (group_id, controller, action),
    constraint perm_fk foreign key (group_id) references groups(id) ON DELETE CASCADE ON UPDATE CASCADE    
);

CREATE TABLE customers (
  id SERIAL PRIMARY KEY,
  name varchar(55) default NULL,
  birthday date default null,
  phone varchar(15) default NULL,
  observation TEXT default NULL,
  created timestamp(0) without time zone DEFAULT NULL,
  modified timestamp(0) without time zone DEFAULT NULL
);

INSERT INTO customers (name,birthday,phone,observation) VALUES ('Eleanor Holden','2017-03-22','(314) 415-4663','inceptos hymenaeos. Mauris ut quam'),('Lee D. Baker','2017-04-20','(126) 696-6268','nonummy ultricies ornare, elit elit'),('Lance Mercado','2016-06-04','(121) 656-3365','elit pede, malesuada vel, venenatis'),('Charlotte Harding','2017-05-05','(307) 714-9319','nec, cursus a, enim. Suspendisse'),('Kirk S. Hodge','2016-06-14','(249) 235-0027','lectus pede et risus. Quisque'),('Medge Petersen','2016-01-28','(168) 508-3620','nec enim. Nunc ut erat.'),('Tyler Sawyer','2015-11-28','(544) 621-3518','Donec non justo. Proin non'),('Cheyenne Hebert','2017-04-06','(232) 690-1422','tincidunt, neque vitae semper egestas,'),('Gage Ross','2017-05-10','(605) 454-4657','dapibus gravida. Aliquam tincidunt, nunc'),('Stephanie C. Wynn','2017-02-24','(864) 432-9931','montes, nascetur ridiculus mus. Proin');
INSERT INTO customers (name,birthday,phone,observation) VALUES ('Rudyard R. Leonard','2017-05-16','(865) 454-0888','feugiat metus sit amet ante.'),('Deirdre K. Pruitt','2017-06-09','(798) 341-1585','tristique neque venenatis lacus. Etiam'),('Rinah Waters','2016-01-04','(173) 370-0983','rutrum, justo. Praesent luctus. Curabitur'),('Ingrid N. Garrison','2017-03-02','(699) 110-3529','Duis ac arcu. Nunc mauris.'),('Yolanda Terry','2017-09-02','(121) 216-3420','Quisque ornare tortor at risus.'),('Mannix C. Compton','2015-11-09','(556) 161-6269','facilisis non, bibendum sed, est.'),('Keiko J. Harmon','2016-06-19','(784) 164-2804','primis in faucibus orci luctus'),('Evangeline S. Walton','2015-12-01','(842) 819-5881','est tempor bibendum. Donec felis'),('Magee T. Castaneda','2016-12-04','(103) 816-0404','auctor, velit eget laoreet posuere,'),('Zenia Mcleod','2016-05-07','(158) 320-6301','non dui nec urna suscipit');
INSERT INTO customers (name,birthday,phone,observation) VALUES ('Amy R. Burch','2016-02-20','(964) 966-9900','libero. Integer in magna. Phasellus'),('Sybil Sharp','2017-02-10','(858) 397-9819','tempor diam dictum sapien. Aenean'),('Adria Gay','2015-10-02','(855) 606-0991','ullamcorper. Duis cursus, diam at'),('Guinevere U. Wilkinson','2016-10-19','(834) 348-9206','interdum ligula eu enim. Etiam'),('Ethan V. Hebert','2015-12-23','(836) 498-8772','non leo. Vivamus nibh dolor,'),('Caleb Pate','2016-04-10','(790) 210-4042','enim. Nunc ut erat. Sed'),('Jaime Estes','2017-03-22','(965) 358-3212','dolor. Fusce feugiat. Lorem ipsum'),('Nichole Warren','2017-04-08','(474) 991-9133','non quam. Pellentesque habitant morbi'),('Aubrey Cash','2017-04-08','(900) 205-1626','Phasellus dolor elit, pellentesque a,'),('Kellie Bradshaw','2016-02-21','(984) 254-4034','semper, dui lectus rutrum urna,');
