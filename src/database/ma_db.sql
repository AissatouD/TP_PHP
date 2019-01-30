
USE ma_db;

CREATE TABLE blog_user (
    id int(10) unsigned auto_increment not null,
    username varchar(255) not null,
    passeword varchar(20) not null,
    PRIMARY KEY (id)

);

CREATE TABLE articles (
    id int(10) unsigned auto_increment not null,
    title varchar(255) not null,
    content text not null,
    author_id varchar(255) not null,
    PRIMARY KEY (id)
    FOREIGN KEY (author_id) REFERENCES blog_user(id)
);

CREATE TABLE comments (
    id int(10) unsigned auto_increment not null,
    pseudo varchar(255) not null,
    content text not null,
    article_id int(10) unsigned not null,
    PRIMARY KEY (id)
    FOREIGN KEY (article_id) REFERENCES articles(id)

);