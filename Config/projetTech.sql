-- we don't know how to generate schema projetTech (class Schema) :(
create table users
(
  nom varchar(50) not null,
  prenom varchar(70) not null,
  login varchar(50) not null,
  password varchar(100) not null,
  id_user int auto_increment
    primary key,
  codepostale varchar(10) not null,
  verified int default '0' null,
  hashmail varchar(50) not null,
  role varchar(30) default 'user' null
)
  engine=InnoDB
;

create table forum
(
  id_forum int auto_increment,
  id_user int not null,
  titre varchar(50) not null,
  contenu longtext not null,
  statut varchar(6) default 'Ouvert' not null,
  date_creation datetime not null,
  alert int default '0' not null,
  primary key (id_forum, id_user),
  constraint forum_users_id_user_fk
  foreign key (id_user) references users (id_user)
)
  engine=InnoDB
;

create table commentaire_forum
(
  id_commentForum int auto_increment
    primary key,
  id_user int not null,
  contenu_com longtext not null,
  date_com datetime not null,
  id_forum int not null,
  id_parent int null,
  alert int default '0' null,
  constraint commentaire_forum_users_id_user_fk
  foreign key (id_user) references users (id_user),
  constraint commentaire_forum_forum_id_forum_fk
  foreign key (id_forum) references forum (id_forum),
  constraint commentaire_forum_commentaire_forum_id_commentForum_fk
  foreign key (id_parent) references commentaire_forum (id_commentForum)
    on update cascade on delete cascade
)
  engine=InnoDB
;

create index commentaire_forum_commentaire_forum_id_commentForum_fk
  on commentaire_forum (id_parent)
;

create index commentaire_forum_forum_id_forum_fk
  on commentaire_forum (id_forum)
;

create index commentaire_forum_users_id_user_fk
  on commentaire_forum (id_user)
;

create index forum_users_id_user_fk
  on forum (id_user)
;

